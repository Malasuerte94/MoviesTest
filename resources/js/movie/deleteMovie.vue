<template>
    <div>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="submit">
                    <div class="form-group">
                        <label for="movie_id">Movie ID</label>
                        <input name="id" v-model="movie_id" type="text" class="form-control" id="movie_id" placeholder="Enter ID">
                    </div>
                <button type="submit" class="btn btn-primary" :disable="loading" >Delete Movie</button>
                </form>
            </div>
            <div class="col-md-6">
                <div class="card" v-if="deleted_movie">
                    <div class="card-body">
                            <h1>DELETED - {{ deleted_movie.name }}</h1><span><i class="fa fa-star pr-1" aria-hidden="true"></i>{{ deleted_movie.rating }}</span>
                            <img :src="'/images/'+ deleted_movie.image" class="card-img-top">
                            <hr />
                            <article>{{ deleted_movie.description }}</article>
                    </div>
                </div>
                <div v-if="status" class="alert alert-warning mt-4" role="alert">
                    Can't find this ID or it's already deleted!
                </div>
            </div>
        </div>
        

    </div>
</template>

<script>
export default {
  data() {
    return {
        movie_id: null,
        loading: false,
        error: false,
        deleted_movie: null,
        status: null,
    };
  },
  methods: {
    submit() {
        this.loading = true;
        this.error = false;
        this.status = null;
        console.log('strge');
        axios
            .delete(`/api/movies/${this.movie_id}`)
            .then((response) => {
                this.deleted_movie = response.data;
            })
            .catch(error => {
                    this.error = true;
                    this.status = error.response.status;
                })
            .then(() => (this.loading = false));
    }
  },
  
};
</script>