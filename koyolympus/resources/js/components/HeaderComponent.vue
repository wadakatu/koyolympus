<template>
    <div class="navbar">
        <img src="/images/mylogo_white.png" class="logo">
        <nav>
            <ul>
                <li><a href="">About Me</a></li>
                <li><a href="">Photography</a></li>
                <li><a>
                    <router-link v-bind:to="{name: 'main.biz'}">Biz Inquiries</router-link>
                </a></li>
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
    padding-top: 20px;
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
