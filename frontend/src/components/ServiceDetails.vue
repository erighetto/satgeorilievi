<template>
    <div>
        <div>Servizio {{ $route.params.id }}</div>
        <ServicesMenu></ServicesMenu>
    </div>
</template>

<script>
    import ServicesMenu from "./ServicesMenu";

    export default {
        name: 'ServicesDetail',
        components: {
            ServicesMenu
        }
    }
</script>

<style scoped>

</style>