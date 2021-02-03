<template>
    <div class="photo-list">
        <div class="grid">
            <PhotoComponent
                class="grid_item"
                v-for="photo in photos"
                :key="photo.id"
                :item="photo"
            ></PhotoComponent>
        </div>
        <PaginateComponent :current-page="currentPage" :last-page="lastPage"></PaginateComponent>
    </div>
</template>

<script>
import {OK} from '../util';
import PhotoComponent from "./PhotoComponent";
import PaginateComponent from "./PaginateComponent";

export default {
    name: "PhotoListComponent.vue",
    components: {
        PhotoComponent,
        PaginateComponent
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
        }
    },
    watch: {
        $route: {
            async handler() {
                await this.fetchPhotos();
            },
            immediate: true,
        }
    }
}
</script>

<style scoped>

.photo-list {
    flex-basis: 50%;
}

</style>
