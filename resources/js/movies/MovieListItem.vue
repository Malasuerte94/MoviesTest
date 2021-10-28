<template>
    <div class="card card-movie w-100 p-2">
        <span v-if="status == 2" class="unlisted">
            unlisted
        </span>
        <img :src="'/images/'+ image" class="card-img-top">
        <div class="card-body d-flex flex-column pt-2 pr-0 pl-3 pb-0 ">

            <router-link :to="{ name:'Movie', params: {id} }">
                <h2 class="card-title">{{ name }}</h2>
            </router-link>

            <span><i class="fa fa-star pr-1" aria-hidden="true"></i>{{ rating }}</span>

            <div class="card-text" v-if="artists.length">
                <div class="artists" v-for="(artist, title) in artistas" :key="title">
                    <b>{{title}}:</b>
                    <template v-for="artist_details in artist">
                        {{ artist_details.name }},
                    </template>
                </div>         
            </div>
            <div class="card-text" v-else>No artists yet!</div>
            
            <router-link :to="{ name:'Movie', params: {id} }">
                <button class="btn mt-auto">View more</button>
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        name: String,
        rating: String,
        image: String,
        id:Number,
        status: Number,
        artists: Array,
    },
    computed: {
        artistas() {
            var grouped = _.mapValues(_.groupBy(this.artists, 'title'),
                  alist => alist.map(artist => _.omit(artist, 'title')));
            return grouped;
        }
    }
}
</script>