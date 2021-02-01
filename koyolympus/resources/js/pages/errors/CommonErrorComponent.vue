<template>
    <div class="col">
        <h1>Woops! Something went wrong.</h1>
        <p>If you found some issue about this website, please let me know through <a
            href="https://github.com/wadakatu/koyolympus"><span>Github</span></a> or <span
            @click="$router.push('/bizinq')">Biz Inquries</span>.
        </p>
        <button>HOME</button>
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

button {
    margin-top: 15px;
    text-align: center;
    padding: 10px;
    cursor: pointer;
    border-radius: 8px;
}

</style>
