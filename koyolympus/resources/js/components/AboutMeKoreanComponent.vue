<template>
    <div class="col">
        <h1>자기소개</h1>
        <language-select-component></language-select-component>
        <div class="intro">
            <h4>이름</h4>
            <h5>코요 이소노</h5>
            <h4>주소</h4>
            <h5>일본, 도쿄와 사이타마 현 사이</h5>
            <h4>나이/ 별자리/ 생일</h4>
            <h5>22살 / 양자리 / 3월 30일</h5>
            <h4>취미</h4>
            <h5>사진 찍기 / 로드 바이킹 / 비디오 게임</h5>
            <h4>내 카메라</h4>
            <h5>올림푸스 PEN-F/ OMD EM-1 MarkⅡ</h5>
            <h4>내 좌우명</h4>
            <h5>될 때까지 부딫혀보자.</h5>
            <button class="button" @click="$router.push('/')">HOME</button>
        </div>
    </div>
</template>

<script>
import LanguageSelectComponent from "./LanguageSelectComponent";

export default {
    name: "AboutMeKoreanComponent.vue",
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

</style>
