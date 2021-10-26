<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-dark nav-imdb">
            
            <button @click="openBurgerMenu" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobilemenu"
                aria-controls="mobilemenu" aria-expanded="false" aria-label="Toggle navigation">
                <div class="animated-burger-menu"><span></span><span></span><span></span></div>
            </button>

            <a class="navbar-brand imdb" href="#"></a>


            <div class="collapse navbar-collapse" id="mobilemenu">

                <!-- Links -->
                <ul class="navbar-nav mr-auto">

                <router-link tag="li" class="nav-item" active-class="active" to="/" exact><a class="nav-link">Movies</a></router-link>
                <router-link tag="li" class="nav-item" active-class="active" to="/top100" exact><a class="nav-link">Top 100</a></router-link>
                <router-link tag="li" class="nav-item" active-class="active" to="/addmovie" exact><a class="nav-link">Add Movie</a></router-link>
                </ul>
                <!-- Links -->

            </div>
            <!-- Collapsible content -->

            <a href="#"><i class="fas fa-user"></i></a>
        </nav>
    </div>
</template>

<script>
export default {
    methods: {
        openBurgerMenu() {
             $('.animated-burger-menu').toggleClass('open');
             $('body').toggleClass('position-fixed');
        }
    }
}
</script>