<template xmlns:loading="http://www.w3.org/1999/html">
    <div class="photo-list" ontouchstart="">
        <loading
            :active.sync="isLoading"
            :is-full-page="fullPage"
            :can-cancel="true"
        ></loading>
        <h2 v-show="noPhoto">There are no photos in this page.</h2>
        <div class="images" v-for="photo in photos">
            <PhotoComponent v-bind:item=photo></PhotoComponent>
        </div>
        <PaginateComponent :current-page="currentPage" :last-page="lastPage"></PaginateComponent>
    </div>
</template>

<script>
import {OK} from '../util';

export default {
    name: "PhotoListComponent.vue",
    components: {
        PhotoComponent: () => import('./PhotoComponent'),
        PaginateComponent: () => import('./PaginateComponent'),
        Loading: () => {
            import('vue-loading-overlay');
            import('vue-loading-overlay/dist/vue-loading.css');
        }
    },
    props: {
        page: {
            type: Number,
            required: false,
            default: 1,
        },
    },
    data() {
        return {
            photos: [],
            currentPage: 0,
            lastPage: 0,
            noPhoto: false,
            isLoading: false,
            fullPage: true,
        }
    },
    methods: {
        async fetchPhotos() {
            this.isLoading = true;
            const response = await axios.get(`/api/photos/?page=${this.page}`, {params: {genre: this.genre}});
            if (response.status !== OK) {
                this.$store.commit('error/setCode', response.status);
                return false;
            }
            this.photos = response.data.data;
            this.currentPage = response.data.current_page;
            this.lastPage = response.data.last_page;
            this.isLoading = false;
        },
    },
    watch: {
        $route: {
            async handler() {
                await this.fetchPhotos();

                this.noPhoto = this.photos.length === 0;
            },
            immediate: true,
        }
    },
    computed: {
        genre() {
            return this.$store.state.photo.genre;
        }
    }
}
</script>

<style scoped>

.photo-list {
    text-align: center;
    height: 50vh;
    margin-bottom: 5vh;
}

h2 {
    color: #fff;
    position: fixed;
    top: 50vh;
    left: 30vw;
    font-size: 40px;
}

.images {
    display: inline-block;
}

@media screen and (max-width: 1350px) {
    .photo-list {
        margin-bottom: 10px;
    }

    h2 {
        font-size: 35px;
    }

    img {
        height: 23vh;
    }
}

@media screen and (max-width: 1050px) {

    h2 {
        left: 28vw;
        font-size: 30px;
    }
}

@media screen and (max-width: 950px) {

    h2 {
        left: 25vw;
    }

    .images {
        margin-top: 6vh;
    }
}

@media screen and (max-width: 650px) {
    .photo-list {
        margin-top: 3vh;
    }

    h2 {
        left: 20vw;
        font-size: 25px;
    }
}

@media screen and (max-width: 480px) {
    .photo-list {
        min-height: 80vh;
        padding-bottom: 5vh;
    }

    h2 {
        font-size: 17px;
    }

    .images {
        margin-top: 2vh;
    }
}

</style>
