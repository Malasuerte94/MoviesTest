import VueRouter from "vue-router";
import Movies from "./movies/Movies";
import Movie from "./movie/Movie";
import MoviesTop from "./movies/MoviesTop";
import AddMovie from "./movie/addMovie";
import DeleteMovie from "./movie/deleteMovie";

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
        path: "/movie/:id",
        component: Movie,
        name: "Movie"
    },
    {
        path: "/add-movie",
        component: AddMovie,
        name: "AddMovie"
    },
    {
        path: "/delete-movie",
        component: DeleteMovie,
        name: "DeleteMovie"
    },
];

const router = new VueRouter({
    routes,
    mode: 'history'
});

export default router;