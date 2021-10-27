<template>
  <div v-if="!loading" class="row">
    <div class="col-md-8 p-2">
        <div class="card">
            <div class="row card-body">
                <div class="col-md-6">

                    <img :src="'/images/'+ movie.image" class="card-img-top" alt="seo description">

                </div>
                <div class="col-md-6">

                    <h1>{{ movie.name }}</h1>
                    <span><i class="fa fa-star pr-1" aria-hidden="true"></i>{{ movie.rating }}</span>
                    <hr />
                    <article>{{ movie.description }}</article>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 p-2">
        <div class="card">
            <div class="pb-4 card-body">

                Artists
                <hr />
                <div class="artists-movie" v-for="artist in movie.artists" :key="artist.id">
                    <span class="avatar rounded-circle"></span>
                    <b class="text-capitalize">{{artist.title}}:</b> {{artist.name}}
                </div> 

            </div>
        </div>
    </div>
  </div>
  <div v-else>Loading ...</div>
</template>

<script>
export default {
  components: {},
  data() {
    return {
      movie: null,
      loading: false,
    };
  },
  created() {
    this.loading = true;
    axios.get(`/api/movies/${this.$route.params.id}`).then((response) => {
      this.movie = response.data;
      this.loading = false;
    });
  },
};
</script>