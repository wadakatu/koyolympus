<template>
    <section class="contact">
        <div class="container">
            <div class="contactForm">
                <form>
                    <h1>Biz Inquiries</h1>
                    <div class="inputBox">
                        <input type="text" name="" required>
                        <span>Your name</span>
                    </div>
                    <div class="inputBox">
                        <input type="email" name="" required>
                        <span>Email</span>
                    </div>
                    <div class="inputBox">
                        <textarea required></textarea>
                        <span>Type your thoughts...</span>
                    </div>
                    <div class="inputBox">
                        <input type="submit" name="" value="Send">
                        <input type="button" name="" @click="$router.push('/')" value="Home">
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
    }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;40;500;600;700;800;900&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Roboto', 'sans-serif';
}

.contact {
    flex-basis: 50%;
    position: relative;
    min-height: 100vh;
    padding: 40px 85px;
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
    margin-top: 30px;
}

.contactForm {
    width: 100%;
    padding: 30px;
    background: transparent;
    margin-right: 50px;
}

.contactForm h1 {
    font-size: 40px;
    margin-bottom: 30px;
    color: #fff;
    font-weight: 500;
    text-align: center;
}

.contactForm .inputBox {
    position: relative;
    width: 100%;
    margin-top: 30px;
}

.contactForm .inputBox input,
.contactForm .inputBox textarea {
    width: 100%;
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
    height: 100px;
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
    width: 100px;
    background: #d1ffd3;
    color: #000;
    border: none;
    cursor: pointer;
    padding: 12px;
    border-radius: 20px;
    font-size: 13px;
    margin-left: 30px;
}

.contactForm .inputBox input[type="button"] {
    width: 100px;
    background: #ffced1;
    color: #000;
    border: none;
    cursor: pointer;
    padding: 12px;
    border-radius: 20px;
    font-size: 13px;
    margin-left: 30px;
}

@media (max-width: 991px) {
    .contact {
        padding: 50px;
    }

    .container {
        flex-direction: column;
    }

    .container .contactInfo {
        margin-bottom: 40px;
    }

    .container .contactInfo,
    .contactForm {
        width: 100%;
    }
}

</style>
