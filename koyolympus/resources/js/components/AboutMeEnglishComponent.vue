<template>
    <div class="col">
        <h1>About me</h1>
        <language-select-component></language-select-component>
        <div class="intro">
            <h4>My Name</h4>
            <h5>Koyo Isono</h5>
            <h4>My Address</h4>
            <h5>Japan, between Tokyo and Saitama Pref.</h5>
            <h4>My Age/Zodiac sign/Birthday</h4>
            <h5>22-year-old / Aries / March 30th</h5>
            <h4>My interest</h4>
            <h5>Camera / Road Bike / Video game</h5>
            <h4>My Camera</h4>
            <h5>OLYMPUS PEN-F / OMD EM-1 MarkⅡ</h5>
            <h4>My Motto</h4>
            <h5>Fake it until you make it.</h5>
            <button class="button" @click="$router.push('/')">HOME</button>
        </div>
    </div>
</template>

<script>
import LanguageSelectComponent from "./LanguageSelectComponent";

export default {
    name: "AboutMeEnglishComponent.vue",
    components: {
        'language-select-component': LanguageSelectComponent,
    }
}
</script>

<style scoped>

.col {
    flex-basis: 50%;
}

.intro {
    text-align: center;
}

h1 {
    color: #fff;
    font-size: 40px;
    margin-bottom: 15px;
    font-weight: 500;
    text-align: center;
}

h4 {
    color: #fff;
    font-size: 16px;
}

h5 {
    color: #fff;
    font-size: 22px;
    border-bottom: solid 2px #1f6fb2;
    margin-bottom: 14px;
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
    margin-top: 9px;
}

@media screen and (max-width: 950px) {
    .col {
        flex-basis: 50%;
        height: 35vh;
        width: 70vw;
        overflow: scroll;
    }

    .intro {
        text-align: center;
    }

    h1 {
        color: #fff;
        font-size: 30px;
        font-weight: 400;
        margin-bottom: 10px;
        text-align: center;
    }

    h4 {
        color: #fff;
        font-size: 12px;
    }

    h5 {
        color: #fff;
        font-size: 17px;
        border-bottom: solid 2px #1f6fb2;
        margin-bottom: 10px;
    }

    button {
        width: 100px;
        color: #000;
        font-size: 11px;
        padding: 12px 0;
        background: #fff;
        border: 0;
        border-radius: 20px;
        outline: none;
        margin-top: 5px;
    }
}

</style>
