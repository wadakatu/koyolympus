<template>
    <div class="like">
        <img src="/images/heart.png" alt="like" @click.prevent="like">
        <div class="aaa"></div>
    </div>
</template>

<script>
export default {
    name: "LikeComponent.vue",
    methods: {
        like() {
            console.log('like!');
        },

    }
}
</script>

<style scoped>

.like {
    text-align: right;
}

.aaa {
    background-image: url("/images/heart.png");
    width: 5px;
}

img {
    width: 20px;
    filter: opacity(0.5) drop-shadow(0 0 0 blue);
    cursor: pointer;
}

</style>
