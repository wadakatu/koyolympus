<template>
    <form action="/api/login" method="post" class="wrapper" v-show="!isLogin" @submit.prevent="login">
        <input type="hidden" name="_token" v-model="csrf">
        <div class="contact-form">
            <div class="input-fields">
                <input type="email" class="input" name="email" placeholder="Email" v-model="loginForm.email" required>
                <div class="error_text" v-html="errors.email"></div>
                <input type="password" class="input" name="password" placeholder="Password"
                       v-model="loginForm.password">
                <div class="error_text" v-html="errors.password"></div>
            </div>
            <button type="submit" class="btn">Send</button>
            <router-link v-bind:to="{name: 'main'}">
                <button class="btn">HOME</button>
            </router-link>
        </div>
    </form>
</template>

<script>
export default {
    name: "LoginComponent.vue",
    data() {
        return {
            errors: {},
            loginForm: {
                email: '',
                password: '',
            },
            isLogin: false,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    },
    methods: {
        async login() {
            await this.$store.dispatch('auth/login', this.loginForm)
            this.$router.push('/upload');
        },
        async logout() {
            await this.$store.dispatch('auth/logout');
            this.$router.push('/login')
        },
        reset() {
            console.log('reset done.');
            Object.assign(this.$data, this.$options.data.call(this));
        },
        mounted() {
            this.reset();
            this.isLogin = false;
        },
    }
}
</script>

<style scoped>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    outline: none;
    font-family: 'Roboto', sans-serif;
}

.wrapper {
    flex-basis: 50%;
    transform: translateY(-50%);
    width: 100%;
    padding: 0 20px;
    margin-top: auto;
}

.contact-form {
    max-width: 70%;
    background: transparent;
    padding: 10px;
    margin: 0 auto;
    border-radius: 5px;
    text-align: center;
}

.input-fields {
    display: flex;
    flex-direction: column;
    margin-right: 4%;
}

.input-fields .input {
    margin-bottom: 15px;
    background: transparent;
    border: 0;
    border-bottom: 2px solid #c5ecfd;
    padding: 10px;
    color: #c5ecfd;
    width: 100%;
}

::-webkit-input-placeholder {
    color: #c5ecfd;
}

::-ms-input-placeholder {
    color: #c5ecfd;
}

.btn {
    background: #39b7dd;
    text-align: center;
    padding: 15px;
    border-radius: 5px;
    color: #fff;
    cursor: pointer;
    text-transform: uppercase;
    margin-left: 15px;
}

.error_text {
    color: #f9ff17;
    margin-bottom: 10px;
    padding-bottom: 50px;
}

</style>
