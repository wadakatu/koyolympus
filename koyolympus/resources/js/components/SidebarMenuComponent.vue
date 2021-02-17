<template>
    <div class="container" v-show="showSidebar">
        <div class="navigation-icons">
            <router-link v-bind:to="{name: 'about.me'}"><img src="/images/human.png"></router-link>
            <p>About Me</p>
            <img src="/images/camera.png">
            <p>Photo</p>
            <router-link v-bind:to="{name: 'main.biz'}"><img src="/images/mail.png"></router-link>
            <p>Inquiry</p>
            <a href="https://github.com/wadakatu/koyolympus"><img src="/images/github.png"></a>
            <p>github</p>
            <router-link v-bind:to="{name: 'login'}"><img src="/images/photo.png"></router-link>
            <p>upload</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "SidebarMenuComponent.vue",
    props: {
        showSidebar: Boolean,
    },
    methods: {
        showNav() {
            this.showSidebar = !this.showSidebar;
        }
    }
}
</script>

<style lang="scss" scoped>

.container {
    position: absolute;
    top: 0;
    left: 0;
    width: 60px;
    padding: 10px;
    min-height: calc(100vh - 20px);
    background-color: transparent;
    border: solid #fff;
    border-width: 0 1px 0 0;
    transition: all .5s ease-in-out;
}

.navigation-icons {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    width: 30px;
    padding: 10px;
    float: left;
}

.navigation-icons p {
    color: #fff;
    text-align: center;
}

img {
    width: 35px;
    margin-top: 80px;
    cursor: pointer;
}

</style>
