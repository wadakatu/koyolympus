<template>
    <div class="col">
        <h1>Woops! Something went wrong.</h1>
        <p>If you found some issue about this website, please let me know through <a
            href="https://github.com/wadakatu/koyolympus"><span>Github</span></a> or <span
            @click="$router.push('/bizinq')">Biz Inquries</span>.
        </p>
        <buttom>HOME</buttom>
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
}

</style>
