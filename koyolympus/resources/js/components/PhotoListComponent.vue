<template>
    <div class="photo-list">
        <div class="images" v-viewer="{movable: false}">
            <a class="luminous" v-for="photo in photos">
                <img :src="photo.url" :key="photo.url"
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
import PhotoComponent from "./PhotoComponent";
import PaginateComponent from "./PaginateComponent";

Vue.use(Viewer)

export default {
    name: "PhotoListComponent.vue",
    components: {
        PhotoComponent,
        PaginateComponent,
    },
    props: {
        page: {
            type: Number,
            required: false,
            default: 1,
        }
    },
    data() {
        return {
            photos: [],
            currentPage: 0,
            lastPage: 0
        }
    },
    methods: {
        async fetchPhotos() {
            const response = await axios.get(`/api/photos/?page=${this.page}`);

            if (response.status !== OK) {
                this.$store.commit('error/setCode', response.status);
                return false;
            }
            this.photos = response.data.data;
            this.currentPage = response.data.current_page;
            this.lastPage = response.data.last_page;
        },
    },
    watch: {
        $route: {
            async handler() {
                await this.fetchPhotos();
            },
            immediate: true,
        }
    },
}
</script>

<style scoped>

.photo-list {
    flex-basis: 50%;
}

img {
    width: 220px;
    height: auto;
    padding: 10px;
}

.images {
    padding: 20px;
}

.luminous {
    display: inline-block;
    position: relative;
    transition: .3s ease-in-out;
    border: 3px solid #ccc;
}

.luminous::before {
    content: "クリック拡大";
    opacity: 0;
    box-sizing: border-box;
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: .5em;
    background: rgba(0, 0, 0, .6);
    color: white;
    font-size: 12px;
    text-align: center;
    transition: inherit;
    transform: translateY(100%);
}

.luminous:hover::before {
    opacity: 1;
    transform: translateY(0);
}


</style>
