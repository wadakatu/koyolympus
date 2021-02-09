<template>
    <div class="col">
        <div class="card" v-model="genre">
            <div class="card_detail landscape" @click="searchLandscape">
                <h5>Landscape</h5>
                <p>The landscape are there, and I just take them.</p>
            </div>
            <div class="card_detail animal" @click="searchAnimal">
                <h5>Animal</h5>
                <p>If you want to be a better animal photographer, stand in front of more animals.</p>
            </div>
            <div class="card_detail portrait" @click="searchPortrait">
                <h5>Portrait</h5>
                <p>The whole point of taking portraits is so that I can see how far people have come.</p>
            </div>
            <div class="card_detail others" @click="searchOthers">
                <h5>Others</h5>
                <p>The Earth is art, The photographer is only a witness.</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            genre: '',
            url: ''
        }
    },
    methods: {
        searchLandscape() {
            this.genre = 1;
            this.url = '/photo/landscape';
            this.$store.commit('photo/setUrl', this.url);
            this.$store.commit('photo/setGenre', this.genre);
            this.$router.push({name: 'photo.landscape'});
        },
        searchAnimal() {
            this.genre = 2;
            this.url = '/photo/animal';
            this.$store.commit('photo/setUrl', this.url);
            this.$store.commit('photo/setGenre', this.genre);
            this.$router.push({name: 'photo.animal'});
        },
        searchPortrait() {
            this.genre = 3;
            this.url = '/photo/portrait';
            this.$store.commit('photo/setUrl', this.url);
            this.$store.commit('photo/setGenre', this.genre);
            this.$router.push({name: 'photo.portrait'});
        },
        searchOthers() {
            console.log('others!');
        }
    },
}
</script>

<style scoped>

.col {
    flex-basis: 50%;
}

.card {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
}

.card_detail {
    position: relative;
    width: 40%;
    height: 250px;
    border-radius: 10px;
    padding: 15px 25px;
    box-sizing: border-box;
    cursor: pointer;
    background-position: center;
    background-size: cover;
    vertical-align: bottom;
    transition: transform 0.5s;
}

.landscape {
    background-image: url('/images/yellow.jpeg');
}

.animal {
    background-image: url('/images/cat.jpeg');
}

.portrait {
    background-image: url('/images/portrait.jpeg');
}

.others {
    background-image: url('/images/wine.jpeg');
}

.card_detail:hover {
    transform: translateY(-10px);
}

h5 {
    color: #fff;
    text-shadow: 0 0 5px #999;
}

p {
    color: #fff;
    font-size: 11px;
    text-shadow: 0 0 15px #000;
}

</style>
