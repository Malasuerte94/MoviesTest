import VueRouter from "vue-router";
import Movies from "./movies/Movies";
import Movie from "./movie/Movie";
import MoviesTop from "./movies/MoviesTop";

const routes = [
    {
        path: "/",
        component: Movies,
        name: "Movies"
    },
    {
        path: "/top100",
        component: MoviesTop,
        name: "Top 100"
    },
    {
        path: "/movies/:id",
        component: Movie,
        name: "Movie"
    },
];

const router = new VueRouter({
    routes,
    mode: 'history'
});

export default router;