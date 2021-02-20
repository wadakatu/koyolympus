<template>
    <footer>
        <nav>
            <ul>
                <li><a href="https://www.instagram.com/wadakatu1234/?hl=ja"><img src="/images/instagram.png"></a>
                </li>
                <li><a href="https://www.facebook.com/people/Koyo-Isono/100006224742543"><img
                    src="/images/facebook.png"></a></li>
                <li><a href="https://twitter.com/ktwdwdwd"><img src="/images/twitter.png"></a></li>
                <li><a href=""><img src="/images/email.png"></a></li>
            </ul>
        </nav>
    </footer>
</template>

<script>

</script>

<style scoped>

img {
    width: 35px;
}

footer {
    position: fixed;
    bottom: 20px;
    left: 0;
    width: 100%;
    text-align: center;
}

nav ul li {
    display: inline-block;
    margin-left: 35px;
    margin-right: 35px;
}

@media screen and (max-width: 950px) {
    footer {
        display: inline-block;
        width: 100%;
    }

    nav ul li {
        display: inline-block;
        margin-left: 35px;
        margin-right: 35px;
    }
}

@media screen and (max-width: 480px) {
    footer {
        display: inline-block;
        width: 100vw;
    }

    nav ul li {
        display: inline-block;
        margin-left: 20px;
        margin-right: 20px;
        margin-top: 5px;
    }
}

</style>
