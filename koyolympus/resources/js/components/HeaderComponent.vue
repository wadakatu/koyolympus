<template>
    <div class="navbar">
        <router-link v-bind:to="{name: 'main'}"><img src="/images/mylogo_white.png" class="logo"></router-link>
        <nav>
            <ul>
                <li><a href="">
                    <router-link v-bind:to="{name: 'about.me'}">About Me</router-link>
                </a></li>
                <li><a href="">Photography</a></li>
                <li><a href="">Biz Inquiries</a></li>
            </ul>
        </nav>
        <img src="/images/menu.png" class="menu-icon">
    </div>
</template>

<script>
export default {
    name: "HeaderComponent.vue"
}
</script>

<style scoped>

.navbar {
    height: 12%;
    display: flex;
    align-items: center;
}

.logo {
    width: 150px;
    cursor: pointer;
}

.menu-icon {
    width: 30px;
    cursor: pointer;
    margin-left: 40px;
}

nav {
    flex: 1;
    text-align: right;
}

nav ul li {
    list-style: none;
    display: inline-block;
    margin-left: 60px;
}

nav ul li a {
    text-decoration: none;
    color: #fff;
    font-size: 15px;
}

</style>
