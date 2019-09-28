<template>
    <div id="dove-siamo">
        <h2>Dove Siamo</h2>

        <div id="map_canvas">
            <l-map ref="myMap" :zoom=14 :center="[45.574961, 11.226351]">
                <l-tile-layer url="http://{s}.tile.osm.org/{z}/{x}/{y}.png"></l-tile-layer>
                <l-marker :lat-lng="[45.574961, 11.226351]"></l-marker>
            </l-map>
        </div>

    </div>
</template>

<script>
    import {LMap, LTileLayer, LMarker} from 'vue2-leaflet';
    import {Icon} from 'leaflet';

    delete Icon.Default.prototype._getIconUrl;

    Icon.Default.mergeOptions({
        iconRetinaUrl: require('leaflet/dist/images/marker-icon-2x.png'),
        iconUrl: require('leaflet/dist/images/marker-icon.png'),
        shadowUrl: require('leaflet/dist/images/marker-shadow.png')
    });

    export default {
        name: "WhereWeAre",
        components: {
            'l-map': LMap,
            'l-tile-layer': LTileLayer,
            'l-marker': LMarker
        },
        mounted () {
            this.$nextTick(() => {
                let infowindow = '<h2>S.A.T. - Studio Associato di Topografia</h2> <p>Via Chiesa 51 - 37030 - Vestenanova (VR)</p>';
                this.$refs.myMap.mapObject.bindPopup(infowindow).openPopup();
            })
        }
    }
</script>

<style scoped>
    @import '~leaflet/dist/leaflet.css';
</style>