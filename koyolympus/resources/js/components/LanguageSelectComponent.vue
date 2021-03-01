<template>
    <ul class="language" ontouchstart="">
        <li class="language_title"><a>Language</a>
            <ul class="language_ul">
                <li class="lang"><a @click="changeLang('/aboutme')" class="lang_detail">日本語</a></li>
                <li class="lang"><a @click="changeLang('/aboutme/english')" class="lang_detail">English</a></li>
                <li class="lang"><a @click="changeLang('/aboutme/french')" class="lang_detail">French</a></li>
                <li class="lang"><a @click="changeLang('/aboutme/korean')" class="lang_detail">한국말</a></li>
                <li class="lang"><a @click="changeLang('/aboutme/chinese')" class="lang_detail">中文</a></li>
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

.language_title {
    width: 25%;
    margin: 0;
    padding: 0;
    text-align: center;
}

.lang_detail {
    display: block;
    margin: 0;
    padding: 13px 0;
    color: #fff;
    font-size: 16px;
    font-weight: bold;
    line-height: 1;
    text-decoration: none;
    cursor: pointer;
}

.language_ul {
    list-style: none;
    position: absolute;
    top: 100%;
    left: 0;
    margin: 0;
    padding: 0;
}

.lang {
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

.lang_detail {
    padding: 13px 15px;
    background: #1a5293;
    text-align: center;
    font-size: 12px;
    font-weight: normal;
}

.language_title:hover > a {
    background: #1a5293;
    color: #e0dc62;
}

.language_title:hover .lang {
    overflow: visible;
    height: 38px;
    border-bottom: 1px solid #fff;
}

.language_title:hover .lang:first-child {
    border-top: 0;
}

.language_title:hover .lang:last-child {
    border-bottom: 0;
}

@media screen and (max-width: 950px) {
    .language {
        margin-left: 45vw;
        width: 20vw;
        height: 3vh;
        z-index: 900;
    }

    .language_title {
        width: 20vw;
    }

    .lang_detail {
        font-size: 25px;
    }

    .language_ul {
        position: relative;
        z-index: 900;
    }

    .lang {
        width: 20vw;
    }

    .lang_detail {
        font-size: 16px;
    }
}

@media screen and (max-width: 480px) {
    .language {
        width: 23vw;
        height: 3vh;
    }

    .language_title {
        width: 23vw;
    }

    .lang_detail {
        padding: 1vh;
        font-size: 30px;
    }

    .lang {
        width: 23vw;
    }

    .lang_detail {
        padding: 15px;
        font-size: 15px;
    }

    .language_title:hover .lang {
        height: 5vh;
        border-bottom: 2px solid #fff;
    }
}


</style>
