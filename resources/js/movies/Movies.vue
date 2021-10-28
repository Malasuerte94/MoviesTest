<template>
    <div>
        <div v-if="loading">
            <h1>Data is loading ... </h1>
        </div>
        <div v-else>
            <div class="row">
                <div class="col-md-12">
                    <movie-filter @changeMovies="ChangeM"></movie-filter>
                </div>
            </div>
            <div class="row" v-for="row in rows" :key="'row' + row">
                <div class="col-md-12 col-lg-4 d-flex align-items-stretch p-2" v-for="(movie, column) in moviesInRow(row)" :key="'row' + row + column">
                    <movie-list-item v-bind="movie"></movie-list-item>
                </div>
                <div class="col-md-12 col-lg-4 p-2" v-for="p in placehodersInRow(row)" :key="'placeholder' + p + row"></div>
            </div>
        </div>
    </div>
</template>


<script>
import MovieListItem from './MovieListItem';
import MovieFilter from './MoviesFilter';

export default {
    components: {
        MovieListItem,
        MovieFilter
    },
    data() {
        return {
            movies: null,
            columns: 3,
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
        },
        ChangeM(movies)
        {   
            this.movies = movies;
            
        },
    },
    created(){
        this.loading = true;
        const request = axios
        .get("/api/movies-artists")
        .then(response => {
            this.movies = response.data;
            this.loading = false;
        });

    },
}
</script>