`
<template>
    <div class="container" v-show="showSidebar">
        <div class="navigation-icons">
            <ul @click="$emit('close')">
                <li>
                    <router-link v-bind:to="{name: 'about.me'}"><img src="/images/human.png" alt="aboutMe">
                    </router-link>
                    <router-link v-bind:to="{name: 'about.me'}"><p>About Me</p></router-link>
                </li>
                <li>
                    <img src="/images/camera.png" alt="Photo" @click="photo">
                    <p @click="photo">Photo</p>
                </li>
                <li>
                    <router-link v-bind:to="{name: 'main.biz'}"><img src="/images/mail.png" alt="bizInquiry">
                    </router-link>
                    <router-link v-bind:to="{name: 'main.biz'}"><p>Inquiry</p></router-link>
                </li>
                <li>
                    <a href="https://github.com/wadakatu/koyolympus"><img src="/images/github.png" alt="github"></a>
                    <a href="https://github.com/wadakatu/koyolympus"><p>github</p></a>
                </li>
                <li>
                    <a href="https://koyolympus.thebase.in/"><img src="/images/photo.png" alt="purchase"></a>
                    <a href="https://koyolympus.thebase.in/"><p style="color: orange">Buy Photo</p></a>
                </li>
                <li class="insta">
                    <a href="https://www.instagram.com/wadakatu1234/?hl=ja">
                        <p>Instagram</p>
                    </a>
                </li>
                <li class="facebook">
                    <a href="https://www.facebook.com/koyolympus/">
                        <p>Facebook</p>
                    </a>
                </li>
            </ul>
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
        },
        photo() {
            let url = '/photo';
            this.$store.commit('photo/setUrl', url);
            this.$store.commit('photo/setGenre', null);
            this.$router.push({name: 'photo.all'}).catch(err => {
            });
        },
    },
}
</script>

<style lang="scss" scoped>

.container {
    position: absolute;
    top: 0;
    left: 0;
    width: 55px;
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
    width: 25px;
    padding: 10px;
}

.navigation-icons p {
    color: #fff;
    text-align: center;
    font-size: 14px;
}

img {
    width: 35px;
    margin-top: 10vh;
    cursor: pointer;
    padding-left: 5px;
}

.insta {
    display: none;
}

.facebook {
    display: none;
}

@media screen and (max-width: 950px) {
    .container {
        width: 5vw;
        padding: 5px;
    }
    .navigation-icons p {
        color: #fff;
        font-size: 12px;
        text-align: center;
    }

    img {
        width: 25px;
        margin-top: 12vh;
        cursor: pointer;
    }
}

@media screen and (max-width: 760px) {
    .container {
        border: 0 solid #fff;
        padding: 5px;
        transition: all .5s ease-in-out;
        z-index: 999;
    }

    .navigation-icons {
        display: inline-block;
        justify-content: center;
        align-items: center;
        width: 25px;
        padding: 10px;
    }

    .navigation-icons ul {
        position: fixed;
        top: 15vh;
        right: 0;
        width: 100vw;
        background: #1b1e21;
        opacity: 0.9;
    }

    .navigation-icons li {
        border-bottom: solid 1px #fff;
        padding: 1vh;
        margin-top: 1vh;
    }

    .navigation-icons li a {
        text-decoration: none;
    }

    .navigation-icons p {
        color: #fff;
        font-size: 33px;
        text-align: center;
        font-weight: bold;
    }

    img {
        display: none;
    }
}

@media screen and (max-width: 480px) {

    .navigation-icons {
        text-align: center;
    }

    .navigation-icons p {
        font-size: 30px;
    }

    .insta {
        display: inline-block;
        text-align: center;
    }

    .facebook {
        display: inline-block;
        text-align: center
    }
}

</style>
