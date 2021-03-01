<template xmlns:loading="http://www.w3.org/1999/html">
    <div class="photo-list" ontouchstart="">
        <loading
            :active.sync="isLoading"
            :is-full-page="fullPage"
            :can-cancel="true"
        ></loading>
        <h2 v-show="noPhoto">There are no photos in this page.</h2>
        <div class="images" v-viewer="{movable: false}">
            <a class="luminous" v-for="photo in photos">
                <img class="item" :src="photo.url" :key="photo.url"
                     alt="This photo taken by Koyo Isono.">
            </a>
        </div>
        <PaginateComponent :current-page="currentPage" :last-page="lastPage"></PaginateComponent>
    </div>
</template>

<script>
import {OK} from '../util';
import 'viewerjs/dist/viewer.css'
import Viewer from 'v-viewer'
import Vue from 'vue'

Vue.use(Viewer)

export default {
    name: "PhotoListComponent.vue",
    components: {
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
    height: 60vh;
    margin-bottom: 5vh;
}

h2 {
    color: #fff;
    position: fixed;
    top: 50vh;
    left: 30vw;
    font-size: 40px;
}

img {
    width: 13vw;
    height: 25vh;
    object-fit: cover;
}

.luminous {
    position: relative;
    transition: .3s ease-in-out;
    border: 3px solid white;
    border-radius: 10px;
    padding: 10px;
    box-sizing: border-box;
    cursor: pointer;
    background-position: center;
    background-size: cover;
    vertical-align: bottom;
}

.images {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.luminous::before {
    content: "クリックして拡大";
    opacity: 0;
    box-sizing: border-box;
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 0.8em;
    background: rgba(0, 0, 0, .6);
    color: white;
    font-size: 12px;
    text-align: center;
    transition: inherit;
    transform: translateY(0%);
}

.luminous:hover::before {
    opacity: 1;
    transform: translateY(0);
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

@media screen and (max-width: 880px) {

    h2 {
        left: 25vw;
    }

    img {
        width: 17vw;
        height: 17vh;
    }

    .images {
        margin-top: 3vh;
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

    img {
        width: 16vw;
        height: 16vh;
    }
}

@media screen and (max-width: 530px) {

    img {
        width: 15vw;
        height: 15vh;
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

    img {
        width: 30vw;
        height: 9vh;
    }
}

</style>
