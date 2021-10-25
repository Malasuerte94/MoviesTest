<template>
    <div>
        <div v-if="loading">
            <h1>Data is loading ... </h1>
        </div>
        <div v-else>
            <div class="row" v-for="row in rows" :key="'row' + row">
                <div class="col d-flex align-items-stretch p-1" v-for="(movie, column) in bookablesInRow(row)" :key="'row' + row + column">
                    <movie-list-item v-bind="movie"></movie-list-item>
                </div>
                <div class="col p-1" v-for="p in placehodersInRow(row)" :key="'placeholder' + p + row"></div>
            </div>
        </div>
    </div>
</template>


<script>
import MovieListItem from './MovieListItem';

export default {
    components: {
        MovieListItem,
    },
    data() {
        return {
            movies: null,
            loading: false,
        };
    },
    computed: {
        rows() {
            return this.movies === null ? 0 : Math.ceil(this.movies.length / this.columns);
        }
    },
    methods: {
        moviesInRow(row) {
            return this.movies.slice((row - 1) * this.columns, row * this.columns);
        },
        placehodersInRow(row) {
            return this.columns - this.moviesInRow(row).length;
        }
    },
    created(){
        this.loading = true;
        const request = axios
        .get("/api/movies")
        .then(response => {
            this.movies = response.data.data;
            this.loading = false;
        });

    },
}
</script>