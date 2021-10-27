<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-dark nav-imdb">
            <button @click="openBurgerMenu"
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#mobilemenu"
            aria-controls="mobilemenu"
            aria-expanded="false"
            aria-label="Toggle navigation">
                <div class="animated-burger-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <router-link to="/"><a class="navbar-brand imdb"></a></router-link>
            <div class="collapse navbar-collapse" id="mobilemenu">
                <ul class="navbar-nav mr-auto">
                    <router-link tag="li" class="nav-item" active-class="active" to="/" exact><a @click="closeBurgerMenu" class="nav-link">Movies</a></router-link>
                    <router-link tag="li" class="nav-item" active-class="active" to="/top100" exact><a @click="closeBurgerMenu" class="nav-link">Top 100</a></router-link>
                    <router-link tag="li" class="nav-item" active-class="active" to="/add-movie" exact><a @click="closeBurgerMenu" class="nav-link">Add Movie</a></router-link>
                    <router-link tag="li" class="nav-item" active-class="active" to="/delete-movie" exact><a @click="closeBurgerMenu" class="nav-link">Delete Movie</a></router-link>
                </ul>
            </div>
            <a href="#">
                <i class="fas fa-user"></i>
            </a>
        </nav>
    </div>
</template>

<script>
export default {
    methods: {
        openBurgerMenu() {
             $('.animated-burger-menu').toggleClass('open');
             $('body').toggleClass('position-fixed w-100');
        },
        closeBurgerMenu(){
            $('#mobilemenu').toggleClass('show');
            $('.animated-burger-menu').toggleClass('open');
            $('body').toggleClass('position-fixed w-100');
        }
    }
}
</script>