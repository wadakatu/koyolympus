<template>
    <div class="photo">
        <figure class="photo_wrapper">
            <img class="photo_image" :src="item.url">
        </figure>
        <router-link
            class="photo_overlay"
            :to="`/photo/${item.id}`"
            :title="`view the bigger photo.`"
        >
            <div class="photo_controls">
                <button class="photo_action photo_action--like" title="Like photo">
                    <i class="icon ion-md-heart"></i>12
                </button>
            </div>
        </router-link>
    </div>
</template>

<script>
export default {
    name: "PhotoComponent.vue",
    props: {
        item: {
            type: Object,
            required: true
        }
    }
}
</script>

<style scoped>

</style>
