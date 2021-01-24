<template>
    <div class="col">
        <h1>About me</h1>
        <language-select-component></language-select-component>
        <div class="intro">
            <h4>名前</h4>
            <h5>磯野 公耀</h5>
            <h4>生息地</h4>
            <h5>東京都と埼玉県の狭間</h5>
            <h4>年齢/星座/誕生日</h4>
            <h5>22歳/おひつじ座/3月30日</h5>
            <h4>趣味</h4>
            <h5>カメラ/ロードバイク/ゲーム</h5>
            <h4>私のカメラ</h4>
            <h5>OLYMPUS PEN-F/OMD EM-1 MarkⅡ</h5>
            <h4>座右の銘</h4>
            <h5>Fake it until you make it.</h5>
            <button class="button" @click="$router.push('/')">TOPへ</button>
        </div>
    </div>
</template>

<script>
import LanguageSelectComponent from "./LanguageSelectComponent";

export default {
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
    font-size: 55px;
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

</style>
