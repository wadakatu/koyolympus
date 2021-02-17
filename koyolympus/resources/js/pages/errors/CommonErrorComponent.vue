<template>
    <div class="col">
        <h1>Woops! Something went wrong.</h1>
        <p>If you found some issue about this website, please let me know through <a
            href="https://github.com/wadakatu/koyolympus"><span>Github</span></a> or <span
            @click="$router.push('/bizinq')">Biz Inquries</span>.
        </p>
        <button class="button home" style="background-color: transparent;" @click="$router.push('/')">HOME</button>
    </div>
</template>

<script>
export default {
    name: "CommonErrorComponent.vue"
}
</script>

<style scoped>

.col {
    text-align: center;
    color: #fff;
    position: relative;
    left: 22%;
}

h1 {
    margin-bottom: 10px;
}

span {
    color: #fff;
    border-bottom: solid 3px white;
    cursor: pointer;
}

.button {
    color: #FFF;
    display: inline-block;
    font-size: 16px;
    font-weight: bold;
    line-height: 30px;
    width: 150px;
    position: fixed;
    text-decoration: none;
    text-transform: uppercase;
    border: 1px solid transparent;
    outline: rgba(255, 255, 255, 0.5) solid 1px;
    outline-offset: 0;
    text-align: center;
    text-shadow: none;
    transition: all 1.2s cubic-bezier(0.2, 1, 0.2, 1);
}

.button:hover {
    border-color: #FFF;
    box-shadow: inset 0 0 20px rgba(255, 255, 255, 0.5), 0 0 20px rgba(255, 255, 255, 0.2);
    outline-color: transparent;
    outline-offset: 12px;
    text-shadow: 2px 2px 3px #000;
}

.button.home {
    bottom: 35%;
    right: 45%;
    cursor: pointer;
}

</style>
