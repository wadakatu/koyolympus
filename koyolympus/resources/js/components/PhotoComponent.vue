<template>
    <div class="photo">
        <a class="luminous">
            <img :src="item.url" alt="Taken by Koyo Isono." @click="showLightBox(item.url)">
        </a>
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
    },
}
</script>

<style scoped>

img {
    width: 230px;
    height: auto;
}

.photo {
    box-sizing: border-box;
    border: 1px solid #ccc;
    margin: 0;
    padding: 20px;
    width: 33.33333333%;
}

.luminous {
    display: inline-block;
    position: relative;
    transition: .3s ease-in-out;
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
