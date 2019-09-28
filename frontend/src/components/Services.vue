<template>
    <div id="servizi">
        <b-container>
            <b-row>
                <b-col>
                    <h2>Servizi</h2>
                    <ServicesMenu></ServicesMenu>
                </b-col>
                <b-col>
                    <img :src="images.dioptra" alt="Servizi Studio Associato Tipografia" class="bordered">
                </b-col>
            </b-row>
        </b-container>

        <h2>Dotazione dello studio</h2>
        <ul>
            <li>2 pc desktop</li>
            <li>2 pc notebook</li>
            <li>plotter HP formato A0</li>
            <li>stampante laser a colori multifunzione sharp</li>
            <li>stampante a colori a getto d'inchiostro HP</li>
            <li>2 misuratori Disto</li>
            <li><a :href="images.trimble5601"
                   class="preview"
                   title="stazione totale robotizzata TRIMBLE 5601">stazione totale robotizzata TRIMBLE 5601</a>
            </li>
            <li><a :href="images.trimble5700"
                   class="preview"
                   title="Base GPS TRIMBLE 5700">Base GPS TRIMBLE 5700</a>
            </li>
            <li><a :href="images.trimbleR8"
                   class="preview"
                   title="Rover GPS TRIMBLE R8 GNSS">Rover GPS TRIMBLE R8 GNSS</a>
            </li>
            <li><a :href="images.GPS"
                   class="preview"
                   title="Base fissa GPS georeferenziata">Base fissa GPS georeferenziata</a>
            </li>
            <li><a :href="images.C10"
                   class="preview"
                   title="Laser scanner Leica ScanStation C10">Laser scanner Leica ScanStation C10</a>
            </li>
        </ul>

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
                    dioptra: require('./../assets/dioptra.jpg'),
                    trimble5601: require('./../assets/strumenti/stazione totale robotizzata TRIMBLE 5601_2.jpg'),
                    trimble5700: require('./../assets/strumenti/Base GPS TRIMBLE 5700_2.jpg'),
                    trimbleR8: require('./../assets/strumenti/Rover GPS TRIMBLE R8 GNSS_2.jpg'),
                    GPS: require('./../assets/strumenti/Antenna Base fissa GPS_2.jpg'),
                    C10: require('./../assets/strumenti/Laser-scanner-Leica-ScanStation-C10.jpg'),
                }
            }
        },
    }
</script>

<style scoped>

</style>