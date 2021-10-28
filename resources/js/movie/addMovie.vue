<template>
    <div>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="upload" >
                <div class="form-group">
                    <label for="name">Name</label>
                    <input v-model="name" type="text" class="form-control" id="name" placeholder="Enter name">
                </div>

                <div class="form-group">
                    <label for="rating">Rating {{ rating }}</label>
                    <input v-model="rating" type="range" min="1" max="10" step="0.1" class="form-control" id="rating" placeholder="Enter rating">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea v-model="description" class="form-control" id="description" rows="3" placeholder="Enter description"></textarea>
                </div>

                <div class="form-group">
                    <label for="movie_image">Image</label>
                    <input type="file" accept="image/*" @change="uploadImage" class="form-control-file" id="movie_image" placeholder="Enter name">
                </div>
        
                <button type="submit" class="btn btn-primary" :disable="loading" v-if="!uploaded_movie">Add Movie</button>
                <button type="button" @click.prevent="resetFields()" class="btn btn-primary" :disable="loading" v-else>Add Another</button>
                </form>
            </div>
            <div class="col-md-6">
                <div class="card" v-if="uploaded_movie">
                    <div class="card-body">
                            <h1>{{ uploaded_movie.name }}</h1><span><i class="fa fa-star pr-1" aria-hidden="true"></i>{{ uploaded_movie.rating }}</span>
                            <img :src="'/images/'+ uploaded_movie.image" class="card-img-top">
                            <hr />
                            <article>{{ uploaded_movie.description }}</article>
                    </div>
                </div>
                <div v-if="error">
                    <div v-for="(invalid, key) in status" :key="key" class="alert alert-warning mt-4" role="alert">
                        {{ invalid[0] }}
                    </div>
                </div>
            </div>
        </div>
        

    </div>
</template>

<script>
export default {
  data() {
    return {
        name: null,
        rating: null,
        description: null,
        movie_image: null,
        loading: false,
        error: false,
        uploaded_movie: null,
        status: null,
    };
  },
  methods: {
    upload() {
        const formData = new FormData();
        formData.set('name', this.name);
        formData.set('rating', this.rating);
        formData.set('description', this.description);
        formData.set('movie_image', this.movie_image);

        this.loading = true;
        this.error = false;
        this.status = null;
        axios
            .post(`/api/movies`, formData)
            .then((response) => {
                this.uploaded_movie = response.data;
            })
            .catch(error => {
                    this.error = true;
                    this.status = error.response.data.errors;
                })
            .then(() => (this.loading = false));
    },
    uploadImage(e){
        this.movie_image = e.target.files[0];
    },
    resetFields () {
            Object.assign(this.$data, this.$options.data.call(this));
    }
  },
};
</script>