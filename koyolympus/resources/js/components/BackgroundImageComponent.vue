<template>
    <div class="container">
        <header-component></header-component>
        <div class="row">
            <router-view></router-view>
            <router-view name="card"></router-view>
        </div>
        <footer-component></footer-component>
    </div>
</template>

<script>
import HeaderComponent from "./HeaderComponent.vue";
import FooterComponent from "./FooterComponent";

export default {
    components: {
        'header-component': HeaderComponent,
        'footer-component': FooterComponent,
    }
}
</script>

<!-- TODO: APIを利用して、S3から任意の画像を取得、背景に適応できるようにする -->
<style scoped>
.container {
    width: 100%;
    height: 100vh;
    background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url("/images/PC280455.jpeg");
    background-position: center;
    background-size: cover;
    padding-left: 8%;
    padding-right: 8%;
    box-sizing: border-box;
}

.row {
    display: flex;
    height: 75%;
    align-items: center;
}
</style>
