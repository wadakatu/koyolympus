<template>
    <div class="col">
        <h1>Koyolympus</h1>
        <p>
            Photography is a means of capturing and preserving the instant that doesn't come twice.
            That's why I cannot stop exploring the world with my camera gear to cut out the exact moment
            that I would like to keep as it is.
        </p>
        <button class="button" @click="this.photo">Explore My Photo</button>
    </div>
</template>

<script>

export default {
    name: "MainMessageComponent.vue",
    methods: {
        photo() {
            let url = '/photo';
            this.$store.commit('photo/setUrl', url);
            this.$store.commit('photo/setGenre', null);
            this.$router.push({name: 'photo.all'}).catch(err => {
            });
        }
    },
}

</script>

<style scoped>

.col {
    flex-basis: 50%;
}

h1 {
    color: #fff;
    font-size: 95px;
}

p {
    color: #fff;
    font-size: 13px;
    line-height: 18px;
}

button {
    width: 180px;
    color: #000;
    font-size: 12px;
    padding: 12px 0;
    background: #fff;
    border: 0;
    border-radius: 20px;
    outline: none;
    margin-top: 30px;
    cursor: pointer;
}

</style>
