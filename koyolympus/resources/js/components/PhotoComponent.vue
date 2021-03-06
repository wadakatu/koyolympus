<template>
    <div class="photo">
        <a class="lightbox" :href="item.url">
            <img class="photo_image" :src="item.url" :alt="`photo taken by ~~`"/>
        </a>
    </div>
</template>

<script>
import {Luminous} from "luminous-lightbox";

export default {
    name: "PhotoComponent.vue",
    props: {
        item: {
            type: Object,
            required: true,
        },
    },
    methods: {
        async luminous() {
            await new Luminous(this.$el.querySelector(".lightbox")).catch(e => {
                console.log(e.message);
            });
        },
    },
    mounted() {
        this.luminous();
    },
};
</script>

<style scoped>
img {
    width: 15vw;
    height: 25vh;
    object-fit: cover;
    cursor: zoom-in;
}

.lightbox {
    position: relative;
    transition: .3s ease-in-out;
    padding: 10px;
    box-sizing: border-box;
    cursor: pointer;
    background-position: center;
    background-size: cover;
    vertical-align: bottom;
}

@media screen and (max-width: 1350px) {
    img {
        width: 14vw;
        height: 22vh;
    }

    .lightbox {
        font-size: 11px;
    }
}

@media screen and (max-width: 900px) {
    img {
        height: 20vh;
    }
}

@media screen and (max-width: 705px) {
    img {
        width: 13vw;
    }
}

@media screen and (max-width: 515px) {
    img {
        width: 12vw;
    }
}

@media screen and (max-width: 480px) {
    img {
        width: 35vw;
        height: 12vh;
    }
}
</style>
