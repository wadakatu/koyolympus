<template>
    <div class="photo-list">
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
import PhotoComponent from "./PhotoComponent";
import PaginateComponent from "./PaginateComponent";
import LikeComponent from "./LikeComponent";

Vue.use(Viewer)

export default {
    name: "PhotoListComponent.vue",
    components: {
        PhotoComponent,
        PaginateComponent,
        LikeComponent
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
        }
    },
    methods: {
        async fetchPhotos() {
            console.log(this.genre);
            const response = await axios.get(`/api/photos/?page=${this.page}`, {params: {genre: this.genre}});
            if (response.status !== OK) {
                this.$store.commit('error/setCode', response.status);
                return false;
            }
            console.log(response.data.data);
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
    margin-bottom: 10px;
}

img {
    width: 200px;
    height: 200px;
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


</style>
