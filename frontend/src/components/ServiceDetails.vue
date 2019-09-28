<template>
    <div>
        <div v-if="$route.params.id === 'rilievi-topografici'">
            <h2>Rilievi Topografici</h2>
            <p> Lo studio esegue <strong>rilievi planimetrici</strong> o <strong>plano-altimetrici</strong> di:
            <ul>
                <li>
                    terreni, o porzioni di territorio
                </li>
                <li>
                    strade,tracciati stradali
                </li>
                <li>
                    tracciati ferroviari,
                </li>
                <li>
                    percorsi di torrenti, fiumi e argini, dighe
                </li>
                <li>
                    fabbricati o complessi industriali, agricoli o commerciali
                </li>
            </ul>
            <div class="clearer"></div>
            <p>Il rilievo topografi è eseguito con l’ausilio di strumenti elettronici o satellitari quali i teodoliti con
                distanziometro integrati, sistemi GPS o scanning mediante laser 3d. Ci approcciamo alla topografia con strumenti
                ad alta precisione.</p>
            <p>Grazie alle nostre esperienze ed al know-how acquisito, sappiamo ottimizzare le fasi di acquisizione dei dati
                territoriali, garantendo rapidità e precisione nella determinazione delle coordinate rilevate.</p>

            <b-container>
                <b-row>
                    <b-col :col=12 :sm=4 class="ambito">
                        <h3>Rilievi con GPS</h3>
                        <img src="~./../assets/rilievo-gps.jpg" title="Rilievo GPS" alt="Rilievo GPS" class="img-fluid" />
                        <p>Eseguiamo il rilievo GPS con rover e base fissa georeferenziata presso la nostra sede per incarichi fino a 20
                            km da Bolca (VR).
                            Effettuiamo rilievi topografici GPS in tutto il Veneto appoggiandoci a basi fisse georeferenziate di nostri
                            collaboratori.
                            <acronym title="modalità statico, statico - veloce, pseudo statico e cinematico">Diverse metodologie di
                                rilievo</acronym>, per ogni specifica esigenza, permettono di utilizzare il sistema GPS in modo molto
                            versatile.</p>
                    </b-col>
                    <b-col :col=12 :sm=4 class="ambito">
                        <h3>Rilievi celerimetrici</h3>
                        <img src="~./../assets/rilievo-celerimetrico.jpg" title="Rilievo Celerimetrico"
                             alt="Rilievo Celerimetrico" class="img-fluid" />
                        <p>Svolgiamo attività di rilievo topografico classico per la determinazione plano-altimetrica dei punti di
                            dettaglio completo del terreno, comunemente detta anche <strong>rilievo celerimetrico</strong>. Grazie
                            all’introduzione di strumenti di misura sempre più sofisticati è possibile determinare tutti i punti esterni
                            di contorno dei prospetti, nonché i punti quota utili per individuare le linee di sezione.</p>
                    </b-col>
                    <b-col :col=12 :sm=4 class="ambito">
                        <h3>Rilievi con laser scanner</h3>
                        <img src="~./../assets/rilievo-laser-scanner-leica-scanstation-c10.jpg"
                             title="Rilievi con laser scanner 3D Leica ScanStation C10"
                             alt="Rilievi con laser scanner 3D Leica ScanStation C10" class="img-fluid"/>
                        <p>Grazie all'innovativo strumento

                            <router-link :to="{name: 'laser_scanner_surveys'}" title="Laser Scanner 3D">LEICA SCANSTATION C10</router-link>
                            otteniamo il rilevamento di modelli
                            tridimensionali di oggetti a scale e risoluzioni differenti. La scansione laser è una soluzione
                            eccezionalmente versatile per l’acquisizione di grandi quantità di dati con tempi di rilievo sensibilmente
                            ridotti, mantenendo sempre altissime precisioni.</p>
                    </b-col>
                </b-row>
            </b-container>
        </div>
        <div v-else-if="$route.params.id === 'piani-quotati'">
            <h2>Piani quotati per miglioramenti fondiari</h2>

            <p>Clicca sulle anteprime per visualizzare alcuni esempi di piani quotati per miglioramenti fondiari</p>
            <p>
                <a href="~./../assets/Es_piano_quotato_1.pdf"
                   title="Realizzazione di piani quotati per miglioramenti fondiari"><img
                        src="~./../assets/piano-quotato-1.jpg" class="bordered"
                        alt="Realizzazione di piani quotati per miglioramenti fondiari"
                        title="Realizzazione di piani quotati per miglioramenti fondiari"/></a>
                <a href="~./../assets/Es_piano_quotato_2.pdf"
                   title="Realizzazione di piani quotati per miglioramenti fondiari"><img
                        src="~./../assets/piano-quotato-2.jpg" class="bordered"
                        alt="Realizzazione di piani quotati per miglioramenti fondiari"
                        title="Realizzazione di piani quotati per miglioramenti fondiari"/></a>
            </p>

            <p>Porta il cursore del mouse sopra l'immagine per visualizzare un esempio di piano quotato</p>
            <p><img src="~./../assets/quotato1_off.jpg" class="rollover bordered"
                    title="Realizzazione di piani quotati per miglioramenti fondiari"
                    alt="Realizzazione di piani quotati per miglioramenti fondiari"></p>
        </div>
        <div v-else-if="$route.params.id === 'frazionamenti-lottizzazioni'">
            <h2>Frazionamenti e tracciamenti di lottizzazioni</h2>

            <p>Clicca sulle anteprime per visualizzare alcuni esempi di frazionamenti e tracciamenti</p>
            <a href="~./../assets/Es_fraz_allarg_strada.pdf" title="alcuni esempi di frazionamenti e tracciamenti"><img src="~./../assets/frazionamento-allargamento-strada.jpg" class="bordered" title="tracciamento strada" alt="tracciamento strada" /></a>
            <a href="~./../assets/Es_fraz_lottizzazione.pdf" title="alcuni esempi di frazionamenti e tracciamenti"><img src="~./../assets/frazionamento-lotizzazione.jpg" class="bordered" alt="frazionamento lottizzazione" title="frazionamento lottizzazione" /></a>

        </div>
        <div v-else-if="$route.params.id === 'accatastamenti-riconfinazioni'">
            <h2>Accatastamenti e riconfinazioni</h2>

            <p>Clicca sulle anteprime per visualizzare alcuni esempi di accatastamenti e riconfinazioni</p>

            <a href="~./../assets/Es_accatastamento_Elaborato Planimetrico.pdf" title="Accatastamento Elaborato Planimetrico">
                <img src="~./../assets/accatastamento-elaborato-planimetrico.jpg" class="bordered" title="Accatastamento Elaborato Planimetrico" alt="Accatastamento Elaborato Planimetrico" /></a>
            <a href="~./../assets/Es_accatastamento_Planimetria.pdf" title="Accatastamento Planimetria">
                <img src="~./../assets/accatastamento-planimetria.jpg" class="bordered" title="Accatastamento Planimetria" alt="Accatastamento Planimetria" /></a>
            <a href="~./../assets/Es_inserimento_catastale.pdf" title="Inserimento catastale">
                <img src="~./../assets/inserimento-catastale.jpg" class="bordered" title="Inserimento catastale" alt="Inserimento catastale" /></a>

        </div>
        <div v-else-if="$route.params.id === 'progettazione-edile'">
            <h2>Progettazione Edile</h2>
            <p>Immagini e specifiche di Progettazione Edile</p>

            <p>Porta il cursore del mouse sopra l'immagine per visualizzare gli esempi di alcuni nostro progetti per
                l'edilizia.</p>
            <p>
                <img src="~./../assets/progetto1_off.jpg" class="rollover bordered"
                     title="Progettazione edile, realizzazione progetti per edilizia privata e industriale"
                     alt="Progettazione edile, realizzazione progetti per edilizia privata e industriale"/>
                <br/>
                <br/>
                <img src="~./../assets/progetto2_off.jpg" class="rollover bordered"
                     title="Progettazione edile, realizzazione progetti per edilizia privata e industriale"
                     alt="Progettazione edile, realizzazione progetti per edilizia privata e industriale"/>
            </p>
        </div>
        <div v-else>
            Not found
        </div>

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