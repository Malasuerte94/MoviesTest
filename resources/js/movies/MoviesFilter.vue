<template>
    <div>
            <div class="form-row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input 
                        type="text" 
                        name="name" 
                        class="form-control form-control-sm" 
                        placeholder="Movie Name"
                        v-model="name"
                        />
                    </div>
                    <div class="form-group">
                        <label for="rating">Min Rating {{ rating }}</label>
                        <input 
                        type="range"
                        min="1.00"
                        max="10.00"
                        step="1.00"
                        value="1.00"
                        name="rating" 
                        class="form-control form-control-sm" 
                        v-model="rating"
                        />
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <div class="form-check">
                        <input name="statusmovie" v-model="status_movie" true-value="1" false-value="null" type="checkbox" value="2" class="form-check-input" id="listed">
                       
                        <label class="form-check-label" for="listed">Only listed</label>
                    </div>
                    <div class="form-check">
                        <input v-model="role" value="null" class="form-check-input" type="radio" name="role" id="all" checked>
                        <label class="form-check-label" for="all">
                            Show All
                        </label>
                    </div>
                    <div class="form-check">
                        <input v-model="role" value="director" class="form-check-input" type="radio" name="role" id="director">
                        <label class="form-check-label" for="director">
                            Has Director
                        </label>
                    </div>
                    <div class="form-check">
                        <input v-model="role"  value="star" class="form-check-input" type="radio" name="role" id="star">
                        <label class="form-check-label" for="star">
                            Has Stars
                        </label>
                    </div>
                    <div class="form-check">
                        <input v-model="role"  value="writer" class="form-check-input" type="radio" name="role" id="writer">
                        <label class="form-check-label" for="writer">
                            Has Writers
                        </label>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <button class="btn btn-primary btn-block" @click="check" :disabled="loading">Check</button>
                </div>  
            </div>
            <div v-if="status == 404" class="alert alert-warning mt-4" role="alert">
                We didn't find any results!
            </div>
    </div>  
</template>

<script>
export default {
    data() {
        return {
            name: null,
            rating: null,
            role: null,
            status_movie: null,
            loading: false,
            status: null,
            error: null,
        }
    },
    methods: {
        check() {
            this.loading = true;
            this.error = null;

            axios.get(`api/movies-artists/filter?name=${this.name}&rating=${this.rating}&status=${this.status_movie}&role=${this.role}`)
                .then(response => {
                    this.passEvent(response.data);
                    this.status = response.status;
                })
                .catch(error => {
                    this.status = error.response.status;
                })
                .then(
                    () => this.loading = false,
                );
        },
        passEvent(movies)
        {
            this.$emit('changeMovies', movies);
        }
    },
}
</script>