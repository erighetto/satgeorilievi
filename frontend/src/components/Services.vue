<template>
    <div>
        <img :src="images.dioptra" class="bordered pull-sm-right">
        <h2>Dotazione dello studio</h2>
        <ul>
            <li>2 pc desktop</li>
            <li>2 pc notebook</li>
            <li>plotter HP formato A0</li>
            <li>stampante laser a colori multifunzione sharp</li>
            <li>stampante a colori a getto d'inchiostro HP</li>
            <li>2 misuratori Disto</li>
        </ul>
        <ServicesMenu></ServicesMenu>
    </div>
</template>

<script>
    import ServicesMenu from "./ServicesMenu";

    export default {
        name: "Services",
        components: {
            ServicesMenu
        },
        data() {
            return {
                images: {
                    dioptra: require('./../assets/dioptra.jpg')
                }
            }
        },
    }
</script>

<style scoped>

</style>