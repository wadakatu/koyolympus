<template>
    <div>
        <div class="navbar">
            <router-link v-bind:to="{name: 'main'}"><img src="/images/mylogo_white.png" class="logo"></router-link>
            <nav>
                <ul>
                    <li><a href="">
                        <router-link v-bind:to="{name: 'about.me'}">About Me</router-link>
                    </a></li>
                    <li><a href="">Photography</a></li>
                    <li><a>
                        <router-link v-bind:to="{name: 'main.biz'}">Biz Inquiries</router-link>
                    </a></li>
                </ul>
            </nav>
            <img src="/images/menu.png" class="menu-icon" @click="showNav">
        </div>
        <sidebar-menu-component v-bind:showSidebar="showSidebars"></sidebar-menu-component>
    </div>
</template>

<script>
import SidebarMenuComponent from "./SidebarMenuComponent";

export default {
    name: "HeaderComponent.vue",
    components: {
        'sidebar-menu-component': SidebarMenuComponent,
    },
    data: () => {
        return {
            showSidebars: false,
        }
    },
    methods: {
        showNav() {
            this.showSidebars = this.showSidebars === false;
        }
    },
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
