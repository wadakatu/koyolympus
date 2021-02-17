<template>
    <main-card-component v-if="this.card"></main-card-component>
    <div class="col" v-else-if="!this.card">
        <div class="card" v-model="genre">
            <div class="card_detail snapshot" @click="searchSnapshot">
                <h5>SnapShot</h5>
                <p>The landscape are there, and I just take them.</p>
            </div>
            <div class="card_detail livecomp" @click="searchLivecomp">
                <h5>Live Composite</h5>
                <p>If you want to be a better animal photographer, stand in front of more animals.</p>
            </div>
            <div class="card_detail pinfilm" @click="searchPinfilm">
                <h5>Pinhole/Film</h5>
                <p>The whole point of taking portraits is so that I can see how far people have come.</p>
            </div>
            <div class="card_detail back" @click="showMain">
                <h5>->Back</h5>
            </div>
        </div>
    </div>
</template>

<script>
import MainCardComponent from "./MainCardComponent";

export default {
    name: "OtherCardComponent.vue",
    components: {
        MainCardComponent,
    },
    data() {
        return {
            genre: '',
            url: '',
        }
    },
    methods: {
        searchSnapshot() {
            this.genre = 4;
            this.url = "/photo/others/snapshot";
            this.$store.commit('photo/setUrl', this.url);
            this.$store.commit('photo/setGenre', this.genre);
            this.$router.push({name: 'photo.snapshot'})
        },
        searchLivecomp() {
            this.genre = 5;
            this.url = "/photo/others/livecomposite";
            this.$store.commit('photo/setUrl', this.url);
            this.$store.commit('photo/setGenre', this.genre);
            this.$router.push({name: 'photo.livecomposite'})
        },
        searchPinfilm() {
            this.genre = 6;
            this.url = "/photo/others/pinfilm";
            this.$store.commit('photo/setUrl', this.url);
            this.$store.commit('photo/setGenre', this.genre);
            this.$router.push({name: 'photo.pinfilm'})
        },
        showMain() {
            this.$store.commit('photo/setCard', true);
        },
    },
    computed: {
        card() {
            return this.$store.state.photo.card;
        }
    }
}
</script>

<style scoped>

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

.snapshot {
    background-image: url("/images/snapshot.jpeg");
}

.livecomp {
    background-image: url("/images/livecomp.jpeg");
}

.pinfilm {
    background-image: url("/images/film.jpeg");
}

.back {
    background-color: #0b5c8c;
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

.back h5 {
    font-size: 25px;
    position: relative;
}

</style>
