<template>
    <footer>
        <nav>
            <ul>
                <li class="sns"><a href="https://www.instagram.com/wadakatu1234/?hl=ja"><img src="/images/instagram.png"
                                                                                             alt="instagram"></a>
                </li>
                <li class="sns"><a href="https://www.facebook.com/koyolympus/"><img
                    src="/images/facebook.png" alt="facebook"></a></li>
                <li class="sns">
                    <router-link v-bind:to="{name: 'main.biz'}"><img src="/images/email.png" alt="bizInquiry">
                    </router-link>
                </li>
            </ul>
        </nav>
    </footer>
</template>

<script>

</script>

<style scoped>

img {
    width: 30px;
}

footer {
    position: fixed;
    padding-top: 20px;
    bottom: 20px;
    left: 0;
    width: 100%;
    text-align: center;
}

.sns {
    display: inline-block;
    margin-left: 5vh;
    margin-right: 5vh;
}

@media screen and (max-width: 950px) {
    footer {
        display: inline-block;
        width: 100%;
    }
}

@media screen and (max-width: 480px) {
    footer {
        display: none;
    }
}

</style>
