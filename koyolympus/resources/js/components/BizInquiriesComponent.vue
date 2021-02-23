<template>
    <section class="contact">
        <div class="container">
            <div class="contactForm">
                <form action="./api/bizinq/send" method="post" @submit.prevent="postInquiry">
                    <input type="hidden" name="_token" v-model="csrf">
                    <h1>Biz Inquiries</h1>
                    <div class="inputBox">
                        <input type="text" name="name" v-model="params.name" required>
                        <span>Your name</span>
                    </div>
                    <div class="error_text" v-html="errors.name"></div>
                    <div class="inputBox">
                        <input type="email" name="email" v-model="params.email" required>
                        <span>Email</span>
                    </div>
                    <div class="error_text" v-html="errors.email"></div>
                    <div class="inputBox">
                        <textarea name="opinion" v-model="params.opinion" required></textarea>
                        <span>Type your thoughts...</span>
                    </div>
                    <div class="error_text" v-html="errors.opinion"></div>
                    <div class="alert-success" v-if="sentEmail">Thank you for getting in touch!</div>
                    <div class="inputBox">
                        <input type="submit" v-bind:disabled="isPush" value="Send">
                        <input type="button" @click="$router.push('/')" value="Home">
                    </div>
                </form>
            </div>
        </div>
    </section>
</template>

<script>
import MainCardComponent from "./MainCardComponent";

export default {
    name: "BizInquiriesComponent.vue",
    components: {
        'main-card-component': MainCardComponent
    },
    data() {
        return {
            errors: {},
            params: {
                name: '',
                email: '',
                opinion: '',
            },
            isPush: false,
            sentEmail: false,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    },
    methods: {
        postInquiry() {
            this.isPush = true;
            this.errors = {};
            let self = this;
            const confirm = window.confirm('Would it be okay to send this inquiry?\nこの内容で送信してよろしいですか？');
            if (!confirm) {
                this.isPush = false;
            } else {
                axios.post('/api/bizinq/send', this.params)
                    .then((response) => {
                        this.reset();
                        self.sentEmail = true;
                    })
                    .catch((error) => {
                        var errors = {};

                        for (var key in error.response.data.errors) {
                            if (error.response.data.errors.hasOwnProperty(key)) {
                                errors[key] = error.response.data.errors[key].join('<br>');
                            }
                        }
                        self.errors = errors;
                    });
            }
        },
        reset() {
            Object.assign(this.$data, this.$options.data.call(this));
        },
        mounted() {
            this.reset();
            this.postInquiry();
        }
    }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap');

.contact {
    flex-basis: 50%;
    position: relative;
    min-height: 80vh;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.container {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.contactForm {
    width: 100%;
    height: 65vh;
    padding: 30px;
    background: transparent;
    margin-right: 30px;
    margin-left: 40px;
}

.contactForm h1 {
    font-size: 40px;
    margin-bottom: 20px;
    color: #fff;
    font-weight: 500;
    text-align: center;
}

.contactForm .inputBox {
    position: relative;
    width: 100%;
    margin-top: 20px;
}

.contactForm .inputBox input,
.contactForm .inputBox textarea {
    width: 32vw;
    padding: 10px 0;
    font-size: 16px;
    margin: 10px 0;
    border: none;
    border-bottom: 2px solid #1f6fb2;
    outline: none;
    background: transparent;
    color: #fff;
}

.contactForm .inputBox textarea {
    resize: none;
    height: 15vh;
}

.contactForm .inputBox span {
    position: absolute;
    left: 0;
    padding: 5px 0;
    font-size: 16px;
    margin: 10px 0;
    pointer-events: none;
    transition: 0.5s;
    color: #fff;
}

.contactForm .inputBox input:focus ~ span,
.contactForm .inputBox input:valid ~ span,
.contactForm .inputBox textarea:focus ~ span,
.contactForm .inputBox textarea:valid ~ span {
    color: #e91e63;
    font-size: 12px;
    transform: translateY(-20px);
}

.contactForm .inputBox input[type="submit"] {
    color: #FFF;
    display: inline-block;
    font-size: 15px;
    font-weight: bold;
    line-height: 20px;
    width: 9vw;
    position: fixed;
    left: 18vw;
    justify-content: space-evenly;
    text-decoration: none;
    text-transform: uppercase;
    border: 1px solid transparent;
    outline: rgb(50, 230, 0) solid 2px;
    outline-offset: 0;
    text-align: center;
    text-shadow: none;
    transition: all 1.2s cubic-bezier(0.2, 1, 0.2, 1);
}

.contactForm .inputBox input[type="button"] {
    color: #FFF;
    display: inline-block;
    font-size: 15px;
    font-weight: bold;
    line-height: 20px;
    width: 9vw;
    position: fixed;
    right: 60vw;
    text-decoration: none;
    text-transform: uppercase;
    border: 1px solid transparent;
    outline: rgb(233, 8, 0) solid 2px;
    outline-offset: 0;
    text-align: center;
    text-shadow: none;
    transition: all 1.2s cubic-bezier(0.2, 1, 0.2, 1);
}

.contactForm .inputBox input[type="button"]:hover {
    border-color: #ffced1;
    box-shadow: inset 0 0 20px rgba(255, 255, 255, 0.5), 0 0 20px rgba(255, 255, 255, 0.2);
    outline-color: transparent;
    outline-offset: 12px;
    text-shadow: 2px 2px 3px #000;
}

.contactForm .inputBox input[type="submit"]:hover {
    border-color: #d1ffd3;
    box-shadow: inset 0 0 20px rgba(255, 255, 255, 0.5), 0 0 20px rgba(255, 255, 255, 0.2);
    outline-color: transparent;
    outline-offset: 12px;
    text-shadow: 2px 2px 3px #000;
}

.error_text {
    color: #f9ff17;
}

.alert-success {
    color: #2eff18;
    text-align: center;
}

@media screen and (max-width: 950px) {
    .contact {

        position: relative;
        min-height: 80vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .container {
        width: 100vw;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .contactForm {
        width: 100vw;
        height: 75vh;
        padding: 30px;
        background: transparent;
        text-align: center;
    }

    .contactForm h1 {
        font-size: 40px;
        margin-bottom: 20px;
        color: #fff;
        font-weight: 500;
        text-align: center;
    }

    .contactForm .inputBox {
        position: relative;
        width: 100%;
        margin-top: 20px;
        text-align: center;
    }

    .contactForm .inputBox input,
    .contactForm .inputBox textarea {
        width: 60vw;
        padding: 10px 0;
        font-size: 16px;
        margin: 10px 0;
        border: none;
        border-bottom: 2px solid #1f6fb2;
        outline: none;
        background: transparent;
        color: #fff;
    }

    .contactForm .inputBox textarea {
        resize: none;
        height: 15vh;
    }

    .contactForm .inputBox span {
        position: absolute;
        left: 12vw;
        padding: 5px 0;
        font-size: 16px;
        margin: 10px 0;
        pointer-events: none;
        transition: 0.5s;
        color: #fff;
    }

    .contactForm .inputBox input:focus ~ span,
    .contactForm .inputBox input:valid ~ span,
    .contactForm .inputBox textarea:focus ~ span,
    .contactForm .inputBox textarea:valid ~ span {
        color: #e91e63;
        font-size: 12px;
        transform: translateY(-20px);
    }

    .contactForm .inputBox input[type="submit"] {
        color: #FFF;
        display: inline-block;
        font-size: 15px;
        font-weight: bold;
        line-height: 20px;
        width: 18vw;
        position: fixed;
        left: 28vw;
        justify-content: space-evenly;
        text-decoration: none;
        text-transform: uppercase;
        border: 1px solid transparent;
        outline: rgb(50, 230, 0) solid 2px;
        outline-offset: 0;
        text-align: center;
        text-shadow: none;
        transition: all 1.2s cubic-bezier(0.2, 1, 0.2, 1);
    }

    .contactForm .inputBox input[type="button"] {
        color: #FFF;
        display: inline-block;
        font-size: 15px;
        font-weight: bold;
        line-height: 20px;
        width: 18vw;
        position: fixed;
        right: 28vw;
        text-decoration: none;
        text-transform: uppercase;
        border: 1px solid transparent;
        outline: rgb(233, 8, 0) solid 2px;
        outline-offset: 0;
        text-align: center;
        text-shadow: none;
        transition: all 1.2s cubic-bezier(0.2, 1, 0.2, 1);
    }

    .contactForm .inputBox input[type="button"]:hover {
        border-color: #ffced1;
        box-shadow: inset 0 0 20px rgba(255, 255, 255, 0.5), 0 0 20px rgba(255, 255, 255, 0.2);
        outline-color: transparent;
        outline-offset: 12px;
        text-shadow: 2px 2px 3px #000;
    }

    .contactForm .inputBox input[type="submit"]:hover {
        border-color: #d1ffd3;
        box-shadow: inset 0 0 20px rgba(255, 255, 255, 0.5), 0 0 20px rgba(255, 255, 255, 0.2);
        outline-color: transparent;
        outline-offset: 12px;
        text-shadow: 2px 2px 3px #000;
    }

    .error_text {
        color: #f9ff17;
    }

    .alert-success {
        color: #2eff18;
        text-align: center;
    }
}

@media screen and (max-width: 480px) {
    .contact {
        position: relative;
        min-height: 85vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .container {
        width: 100vw;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .contactForm {
        width: 100vw;
        height: 75vh;
        padding: 30px;
        background: transparent;
        text-align: center;
    }

    .contactForm h1 {
        font-size: 40px;
        margin-bottom: 2vh;
        color: #fff;
        font-weight: 500;
        text-align: center;
    }

    .contactForm .inputBox {
        position: relative;
        width: 100%;
        margin-top: 20px;
        text-align: center;
    }

    .contactForm .inputBox input,
    .contactForm .inputBox textarea {
        width: 80vw;
        padding: 10px 0;
        font-size: 16px;
        margin: 10px 0;
        border: none;
        border-bottom: 2px solid #1f6fb2;
        outline: none;
        background: transparent;
        color: #fff;
    }

    .contactForm .inputBox textarea {
        resize: none;
        height: 18vh;
    }

    .contactForm .inputBox span {
        position: absolute;
        left: 0;
        padding: 5px 0;
        font-size: 16px;
        margin: 10px 0;
        pointer-events: none;
        transition: 0.5s;
        color: #fff;
    }

    .contactForm .inputBox input:focus ~ span,
    .contactForm .inputBox input:valid ~ span,
    .contactForm .inputBox textarea:focus ~ span,
    .contactForm .inputBox textarea:valid ~ span {
        color: #e91e63;
        font-size: 12px;
        transform: translateY(-20px);
    }

    .contactForm .inputBox input[type="submit"] {
        color: #FFF;
        display: inline-block;
        font-size: 15px;
        font-weight: bold;
        line-height: 20px;
        width: 25vw;
        position: relative;
        left: -5vw;
        justify-content: space-evenly;
        text-decoration: none;
        text-transform: uppercase;
        border: 1px solid transparent;
        outline: rgb(50, 230, 0) solid 2px;
        outline-offset: 0;
        text-align: center;
        text-shadow: none;
        transition: all 1.2s cubic-bezier(0.2, 1, 0.2, 1);
    }

    .contactForm .inputBox input[type="button"] {
        color: #FFF;
        display: inline-block;
        font-size: 15px;
        font-weight: bold;
        line-height: 20px;
        width: 25vw;
        position: relative;
        right: -5vw;
        text-decoration: none;
        text-transform: uppercase;
        border: 1px solid transparent;
        outline: rgb(233, 8, 0) solid 2px;
        outline-offset: 0;
        text-align: center;
        text-shadow: none;
        transition: all 1.2s cubic-bezier(0.2, 1, 0.2, 1);
    }

    .contactForm .inputBox input[type="button"]:hover {
        border-color: #ffced1;
        box-shadow: inset 0 0 20px rgba(255, 255, 255, 0.5), 0 0 20px rgba(255, 255, 255, 0.2);
        outline-color: transparent;
        outline-offset: 12px;
        text-shadow: 2px 2px 3px #000;
    }

    .contactForm .inputBox input[type="submit"]:hover {
        border-color: #d1ffd3;
        box-shadow: inset 0 0 20px rgba(255, 255, 255, 0.5), 0 0 20px rgba(255, 255, 255, 0.2);
        outline-color: transparent;
        outline-offset: 12px;
        text-shadow: 2px 2px 3px #000;
    }

    .error_text {
        color: #f9ff17;
    }

    .alert-success {
        color: #2eff18;
        text-align: center;
    }
}

</style>
