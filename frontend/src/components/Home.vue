<template>
    <div class="home">
        <h2>Rilievi Topografici</h2>

        <p>S.a.t. opera dal 1997 nel settore della topografia e dell'edilizia a supporto di privati, enti pubblici, imprese e liberi professionisti.</p>

        <b-row>
            <b-col class="col-sm-4">
                <ul>
                    <li>Rilievi topografici con gps</li>
                    <li>Rilievi celerimetrici</li>
                    <li>Rilievi di poligonali</li>
                    <li>Rilievi con laser scanner 3D</li>
                </ul>
            </b-col>
            <b-col class="col-sm-4">
                <ul>
                    <li>Frazionamenti</li>
                    <li>Inserimenti in mappa</li>
                    <li>Riconfinazioni</li>
                    <li>Tracciamenti</li>
                    <li>Piani quotati</li>
                </ul>
            </b-col>
        </b-row>

        <p>Operiamo su tutto il territorio nazionale, per quanto riguarda le rilevazioni topografiche in ambito catastale, avvalendoci di personale altamente specializzato e tecnologie d'avanguardia. Fiore all'acchiello dell'azienda &#232; il Laser Scanner Leica ScanStation C10.</p>

        <p><img :src="images.content_home" alt="S.A.T. - Studio Associato di Topografia, rilievi gps, rilievo celerimetrico, rilievi topografici" title="S.A.T. - Studio Associato di Topografia, rilievi gps, rilievo celerimetrico, rilievi topografici" class="img-fluid"></p>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                name: "Home",
                images: {
                    content_home: require('./../assets/immagine-home.jpg')
                }
            }
        }
    }
</script>

<style scoped>

</style>