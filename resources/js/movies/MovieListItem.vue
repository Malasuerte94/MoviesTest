<template>
    <div class="card card-movie w-100 p-2">
        <img :src="image" class="card-img-top" alt="seo description">
        <div class="card-body d-flex flex-column pt-2 pr-0 pl-3 pb-0 ">
            <router-link :to="{ name:'movies', params: {id} }">
                <h2 class="card-title">{{ name }}</h2>
            </router-link>
            <div class="card-text">
                <span><i class="fa fa-star pr-1" aria-hidden="true"></i>{{ rating }}</span>
                <p class="description">
                    This is test content for humans if this is needd we will show you.
                </p>
            </div>
            <button class="btn mt-auto">View more</button>
        </div>
    </div>
</template>

<script>
export default {
    props: {name: String, rating: String, image: String, id:Number}
}
</script>