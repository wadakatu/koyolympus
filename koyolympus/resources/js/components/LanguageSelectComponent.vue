<template>
    <ul class="language" ontouchstart="">
        <li><a>Language</a>
            <ul>
                <li><a @click="changeLang('/aboutme')">日本語</a></li>
                <li><a @click="changeLang('/aboutme/english')">English</a></li>
                <li><a @click="changeLang('/aboutme/french')">French</a></li>
                <li><a @click="changeLang('/aboutme/korean')">한국말</a></li>
                <li><a @click="changeLang('/aboutme/chinese')">中文</a></li>
            </ul>
        </li>
    </ul>
</template>

<script>
export default {
    name: "LanguageSelectComponent.vue",
    methods: {
        changeLang: function (redirectToURL) {
            const currentPath = this.$route.path;

            if (currentPath !== redirectToURL) {
                this.$router.push(redirectToURL);
            }
        }
    },
}
</script>

<style scoped>

.language {
    margin-left: 85%;
    background-color: #1a5293;
    color: #fff;
    position: relative;
    list-style-type: none;
    width: 75px;
    height: 25px;
    z-index: 990;
}

.language li {
    width: 25%;
    margin: 0;
    padding: 0;
    text-align: center;
}

.language ul a {
    display: block;
    margin: 0;
    padding: 13px 0;
    color: #fff;
    font-size: 16px;
    font-weight: bold;
    line-height: 1;
    text-decoration: none;
}

.language li ul {
    list-style: none;
    position: absolute;
    top: 100%;
    left: 0;
    margin: 0;
    padding: 0;
}

.language li ul li {
    overflow: hidden;
    width: 75px;
    height: 0;
    color: #fff;
    -moz-transition: .2s;
    -webkit-transition: .2s;
    -o-transition: .2s;
    -ms-transition: .2s;
    transition: .2s;
}

.language li ul li a {
    padding: 13px 15px;
    background: #1a5293;
    text-align: center;
    font-size: 12px;
    font-weight: normal;
}

.language li:hover > a {
    background: #1a5293;
    color: #e0dc62;
}

.language li:hover ul li {
    overflow: visible;
    height: 38px;
    border-bottom: 1px solid #fff;
}

.language li:hover ul li:first-child {
    border-top: 0;
}

.language li:hover ul li:last-child {
    border-bottom: 0;
}

@media screen and (max-width: 950px) {
    .language {
        margin-left: 45vw;
        background-color: #1a5293;
        color: #fff;
        position: relative;
        list-style-type: none;
        width: 20vw;
        height: 3vh;
        z-index: 900;
    }

    .language li {
        width: 20vw;
        margin: 0;
        padding: 0;
        text-align: center;
    }

    .language ul a {
        display: block;
        margin: 0;
        padding: 13px 0;
        color: #fff;
        font-size: 25px;
        font-weight: bold;
        line-height: 1;
        text-decoration: none;
    }

    .language li ul {
        list-style: none;
        position: relative;
        top: 100%;
        left: 0;
        margin: 0;
        padding: 0;
        z-index: 900;
    }

    .language li ul li {
        overflow: hidden;
        width: 20vw;
        height: 0;
        color: #fff;
        -moz-transition: .2s;
        -webkit-transition: .2s;
        -o-transition: .2s;
        -ms-transition: .2s;
        transition: .2s;
    }

    .language li ul li a {
        padding: 13px 15px;
        background: #1a5293;
        text-align: center;
        font-size: 16px;
        font-weight: normal;
    }
}

@media screen and (max-width: 480px) {
    .language {
        background-color: #1a5293;
        color: #fff;
        position: relative;
        list-style-type: none;
        width: 23vw;
        height: 3vh;
        z-index: 900;
    }

    .language li {
        width: 23vw;
        text-align: center;
    }

    .language ul a {
        display: block;
        padding: 1vh;
        color: #fff;
        font-size: 30px;
        font-weight: bold;
        text-decoration: none;
    }

    .language li ul {
        list-style: none;
        position: relative;
        top: 0;
        left: 0;
        z-index: 900;
    }

    .language li ul li {
        overflow: hidden;
        width: 23vw;
        height: 0;
        color: #fff;
        -moz-transition: .2s;
        -webkit-transition: .2s;
        -o-transition: .2s;
        -ms-transition: .2s;
        transition: .2s;
    }

    .language li ul li a {
        padding: 15px;
        background: #1a5293;
        text-align: center;
        font-size: 15px;
        font-weight: normal;
    }

    .language li:hover > a {
        background: #1a5293;
        color: #e0dc62;
    }

    .language li:hover ul li {
        overflow: visible;
        height: 5vh;
        border-bottom: 2px solid #fff;
    }

    .language li:hover ul li:first-child {
        border-top: 0;
    }

    .language li:hover ul li:last-child {
        border-bottom: 0;
    }
}


</style>
