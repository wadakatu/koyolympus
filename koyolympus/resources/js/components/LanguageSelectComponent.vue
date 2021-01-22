<template>
    <ul class="language">
        <li><a>Language</a>
            <ul>
                <li><a @click="$router.push('/aboutme')">日本語</a></li>
                <li><a @click="$router.push('/aboutme/english')">English</a></li>
                <li><a>French</a></li>
                <li><a>한국말</a></li>
                <li><a>中文</a></li>
            </ul>
        </li>
    </ul>
</template>

<script>
export default {
    name: "LanguageSelectComponent.vue"
}
</script>

<style scoped>

.language {
    margin-left: 85%;
    background-color: #1a5293;
    color: #fff;
    position: relative;
    list-style-type: none;
    width: 80px;
    height: 25px;
    border-radius: 15px;
    padding-left: 8px;
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
    width: 80px;
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
    text-align: left;
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

</style>
