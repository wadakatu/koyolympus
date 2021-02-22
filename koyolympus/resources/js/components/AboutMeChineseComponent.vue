<template>
    <div class="col">
        <h1>关于我</h1>
        <language-select-component></language-select-component>
        <div class="intro">
            <h4>我的名字</h4>
            <h5>磯野公耀</h5>
            <h4>我的地址</h4>
            <h5>日本东京 埼玉县</h5>
            <h4>年龄/标志/生日</h4>
            <h5>22岁/白羊座/三月三十号</h5>
            <h4>我的爱好</h4>
            <h5>摄影/公路车/电竞游戏</h5>
            <h4>我的相机</h4>
            <h5>OLYMPUS PEN-F/OMD EM-1 MarkⅡ</h5>
            <h4>我的格言</h4>
            <h5>Fake it until you make it.</h5>
            <button class="button" @click="$router.push('/')">TOPへ</button>
        </div>
    </div>
</template>

<script>

import LanguageSelectComponent from "./LanguageSelectComponent";

export default {
    name: "AboutMeChineseComponent.vue",
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
        padding: 1vh;
    }

    .intro {
        text-align: center;
    }

    h1 {
        color: #fff;
        font-size: 28px;
        font-weight: 400;
        margin-bottom: 1vh;
        text-align: center;
    }

    h4 {
        color: #fff;
        font-size: 14px;
    }

    h5 {
        color: #fff;
        font-size: 18px;
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
