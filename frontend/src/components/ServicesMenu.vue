<template>
    <ul id="servizi" class="nav flex-column">
        <li v-for="item in $options.myJson" class="nav-item">
            <router-link class="nav-link" :to="{name: 'service_details', params: { id: item.binding_path }}">
                {{item.menu}}
            </router-link>
        </li>
    </ul>
</template>

<script>
    import json from '../services.json'

    export default {
        name: "ServicesMenu",
        myJson: json
    }
</script>

<style scoped>

</style>