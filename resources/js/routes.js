import VueRouter from "vue-router";
import Movies from "./movies/Movies";
import Movie from "./movie/Movie";

const routes = [
    {
        path: "/",
        component: Movies,
        name: "Movies"
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