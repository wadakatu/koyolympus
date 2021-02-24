<template>
    <div class="col">
        <h1>À propos de moi</h1>
        <language-select-component></language-select-component>
        <div class="intro">
            <h4>Mon Nom</h4>
            <h5>Koyo Isono</h5>
            <h4>Mon Adresse</h4>
            <h5>Japan, entre Tokyo et Saitama.</h5>
            <h4>Mon Âge/Signe du zodiaque/Anniversaire</h4>
            <h5>22 ans / Le Bélier / Le 30 Mars</h5>
            <h4>Mes centres d’intérêt</h4>
            <h5>Caméra / Vélo de route / Jeu vidéo</h5>
            <h4>Ma caméra</h4>
            <h5>OLYMPUS PEN-F / OMD EM-1 MarkⅡ</h5>
            <h4>Ma devise</h4>
            <h5>Tout est dans l'attitude</h5>
            <button class="button" @click="$router.push('/')">HOME</button>
        </div>
    </div>
</template>

<script>
import LanguageSelectComponent from "./LanguageSelectComponent";

export default {
    name: "AboutMeFrenchComponent.vue",
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
    margin-bottom: 30px;
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
        height: 100vh;
        width: 70vw;
        padding: 3vh;
    }

    .intro {
        text-align: center;
    }

    h1 {
        color: #fff;
        font-size: 30px;
        font-weight: 400;
        margin-bottom: 2vh;
        text-align: center;
    }

    h4 {
        color: #fff;
        font-size: 15px;
    }

    h5 {
        color: #fff;
        font-size: 20px;
        border-bottom: solid 2px #1f6fb2;
    }

    button {
        width: 130px;
        color: #000;
        font-size: 11px;
        padding: 12px 0;
        background: #fff;
        border: 0;
        border-radius: 20px;
        outline: none;
        margin-top: 1vh;
    }
}

@media screen and (max-width: 480px) {
    .col {
        flex-basis: 50%;
        height: 100vh;
        width: 70vw;
        padding: 3vh;
    }

    .intro {
        text-align: center;
    }

    h1 {
        color: #fff;
        font-size: 30px;
        font-weight: 400;
        margin-bottom: 2vh;
        text-align: center;
    }

    h4 {
        color: #fff;
        font-size: 14px;
    }

    h5 {
        color: #fff;
        font-size: 19px;
        border-bottom: solid 2px #1f6fb2;
    }

    button {
        width: 130px;
        color: #000;
        font-size: 11px;
        padding: 12px 0;
        background: #fff;
        border: 0;
        border-radius: 20px;
        outline: none;
        margin-top: 3vh;
    }
}


</style>
