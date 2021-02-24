<template>
    <main-card-component v-if="this.card"></main-card-component>
    <div class="col" v-else-if="!this.card">
        <div class="card" v-model="genre">
            <div class="card_detail snapshot" @click="searchSnapshot">
                <h5>SnapShot</h5>
                <p>It is more important to click with people than to click the shutter.</p>
            </div>
            <div class="card_detail livecomp" @click="searchLivecomp">
                <h5>Live Composite</h5>
                <p>Since I’m inarticulate, I express myself with images.</p>
            </div>
            <div class="card_detail pinfilm" @click="searchPinfilm">
                <h5>Pinhole/Film</h5>
                <p>Seeing is not enough; you have to feel what you photograph</p>
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
    background-color: #000;
    opacity: 0.7;
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

@media screen and (max-width: 1150px) {
    .col {
        flex-basis: 50%;
    }

    .card {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .card_detail {
        height: 15vh;
        width: 30vw;
    }
}

@media screen and (max-width: 950px) {

    .card {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-bottom: 25px;
    }

    .card_detail {
        height: 10vh;
        width: 60vh;
    }
}

@media screen and (max-width: 480px) {
    .card {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 3vh;
    }

    .card_detail {
        height: 8vh;
        width: 40vh;
        margin-top: 2vh;
    }

    p {
        display: none;
    }
}


</style>
