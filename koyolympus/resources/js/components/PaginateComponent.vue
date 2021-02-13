<template>
    <div class="pagination">
        <RouterLink
            v-if="! isFirstPage"
            :to="`${this.url}/?page=${currentPage - 1}`"
            class="button prev"
        >&laquo; prev
        </RouterLink>
        <button class="button home" style="background-color: transparent;" @click="moveMainPage">&laquo; HOME
            &raquo;
        </button>
        <RouterLink
            v-if="! isLastPage"
            :to="`${this.url}/?page=${currentPage + 1}`"
            class="button next"
        >next &raquo;
        </RouterLink>
    </div>
</template>

<script>
export default {
    name: "PaginateComponent.vue",
    props: {
        currentPage: {
            type: Number,
            required: true
        },
        lastPage: {
            type: Number,
            required: true
        },
    },
    methods: {
        moveMainPage() {
            this.$router.push('/');
        }
    },
    computed: {
        isFirstPage() {
            return this.currentPage === 1;
        },
        isLastPage() {
            return this.currentPage === this.lastPage;
        },
        url() {
            return this.$store.state.photo.url;
        }
    },
}
</script>

<style scoped>

.button {
    color: #FFF;
    display: inline-block;
    font-size: 16px;
    font-weight: bold;
    line-height: 30px;
    width: 10vw;
    position: fixed;
    text-decoration: none;
    text-transform: uppercase;
    border: 1px solid transparent;
    outline: rgba(255, 255, 255, 0.5) solid 1px;
    outline-offset: 0;
    text-align: center;
    text-shadow: none;
    transition: all 1.2s cubic-bezier(0.2, 1, 0.2, 1);
}

.button:hover {
    border-color: #FFF;
    box-shadow: inset 0 0 20px rgba(255, 255, 255, 0.5), 0 0 20px rgba(255, 255, 255, 0.2);
    outline-color: transparent;
    outline-offset: 12px;
    text-shadow: 2px 2px 3px #000;
}

.button.next {
    bottom: 12%;
    right: 26%;
}

.button.prev {
    bottom: 12%;
    left: 26%;
}

.button.home {
    bottom: 12%;
    right: 45%;
    cursor: pointer;
}

</style>
