<template>
    <div id="dove-siamo">
        <h2>Dove Siamo</h2>

        <div id="map_canvas">S.A.T. - Studio Associato di Topografia</div>
    </div>
</template>

<script>
    export default {
        name: "WhereWeAre",
        mounted() {
            let leaflet = document.createElement('script');
            leaflet.setAttribute('src', 'https://unpkg.com/leaflet@1.5.1/dist/leaflet.js');
            document.head.appendChild(leaflet);
            this.initMap();
        },
        methods: {
            initMap() {
                let pin = L.icon({
                    iconUrl: 'https://unpkg.com/leaflet@1.5.1/dist/images/marker-icon.png'
                });
                let infowindow = '<h2>S.A.T. - Studio Associato di Topografia</h2> <p>Via Chiesa 51 - 37030 - Vestenanova (VR)</p>';
                let latitude_pin = "45.574961";
                let longitude_pin = "11.226351";
                this.map = L.map('map_canvas', {scrollWheelZoom: false}).setView([latitude_pin, longitude_pin], 12);

                this.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(this.map);

                L.marker([latitude_pin, longitude_pin], {icon: pin})
                    .addTo(this.map)
                    .bindPopup(infowindow).openPopup();
            },
        },
    }
</script>

<style scoped>
    @import url("https://unpkg.com/leaflet@1.5.1/dist/leaflet.css") media-types;
</style>