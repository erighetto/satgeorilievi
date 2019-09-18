// App.vue
<template>
  <div id="app">
    <b-container id="header">
      <nav class="navbar navbar-expand-lg navbar-light">
        <router-link :to="{name: 'home'}" v-slot="{ href, route, navigate }">
            <a :href="href" :title="name" class="navbar-brand">SAT</a>
        </router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <router-link class="nav-link" :to="{name: 'home'}">Home</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" :to="{name: 'who_we_are'}">Chi Siamo</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" :to="{name: 'services'}">Servizi</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" :to="{name: 'where_we_are'}">Dove Siamo</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" :to="{name: 'contacts'}">Contatti</router-link>
            </li>
          </ul>
        </div>
      </nav>
      <!-- BEGIN BANNER -->
      <div id="banner">
        <b-row>
          <b-col cols="4">
            <img src="~./assets/logo.jpg" alt="SAT georilievi">
          </b-col>
          <b-col cols="8">
            <div id="quote" class="d-flex align-items-center">
              <h1>Studio Associato di Topografia</h1>
              <h2>di Salgaro geom. Adriano & Gonzato geom. Luigi</h2>
            </div>
          </b-col>
        </b-row>
        <b-row>
          <b-col>
            <div id="headline">
              <h3>rilievo topografico con gps, rilievo celerimetrico, rilievo di poligonali, rilievo laser scanner 3D, frazionamento, inserimento in mappa, riconfinazione, tracciamento, piano quotato</h3>
            </div>
          </b-col>
        </b-row>
      </div>
      <!-- END BANNER -->
    </b-container>

    <b-container id="content">
      <b-row>
        <b-col id="left_col" class="col-md-8">
          <router-view></router-view>
        </b-col>
        <b-col id="right_col" class="col-md-4">
          <h2>Cerca nel sito</h2>

          <div id="search">

          </div>

          <div id="news">
            <h2>In evidenza</h2>
            <ul class="list-unstyled">
              <li>
                <router-link :to="{name: 'laser_scanner_surveys'}"title="Rilievi laser scanner 3d">
                  <span class="title">Rilievi laser scanner 3d</span>
                  <span class="author">Scansioni laser con Leica ScanStation C10 per modelli 3D</span>
                </router-link>
              </li>
              <li>
                <router-link :to="{name: 'services'}" title="Attivit&agrave; dello studio">
                  <span class="title">Attivit&agrave; dello studio</span>
                  <span class="author">Piani quotati - Frazionamenti e tracciamenti - Accatastamenti e riconfinazioni - Progettazione edile</span>
                </router-link>
              </li>
              <li>
                <router-link :to="{name: 'contacts'}" title="Richiedi un preventivo per rilievi Topografici">
                  <span class="title">Richiedi un preventivo</span>
                  <span class="author">Rilevazioni topografiche con tecnologie avanzate</span>
                </router-link>
              </li>
            </ul>

          </div>
        </b-col>
      </b-row>
    </b-container>

    <!-- BEGIN FOOTER -->
      <b-container id="footer">
        <b-row class="justify-content-sm-center">
          <b-col class="col-sm-auto">
            <ul class="nav">
              <li class="nav-item">
                <router-link class="nav-link" :to="{name: 'home'}">Home</router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" :to="{name: 'who_we_are'}">Chi Siamo</router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" :to="{name: 'services'}">Servizi</router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" :to="{name: 'where_we_are'}">Dove Siamo</router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" :to="{name: 'contacts'}">Contatti</router-link>
              </li>
            </ul>
          </b-col>
          <b-col class="col-sm-auto">
            <ul class="list-inline">
              <li class="list-inline-item">
                <router-link :to="{name: 'news'}" title="Notizie legate al laser scanner 3d Leica ScanStation C10" class="nav-link">News</router-link>
              </li>
              <li class="list-inline-item">
                <a class="nav-link" href="https://www.facebook.com/pages/SAT-Studio-Associato-di-Topografia/171384416273640" title="Rilevazioni con laserscanner 3D">
                  <img :src="images.fb_footer"  id="fb-icon" alt="Rilevazioni con laserscanner 3D" title="Rilevazioni con laserscanner 3D" />
                </a>
              </li>
            </ul>
          </b-col>
        </b-row>
        <b-row>
          <b-col class="col-sm">
            <p>&copy; {{ new Date().getFullYear() }} S.A.T. - Studio Associato di Topografia. All rights reserved. <span class="hosting">Provided by <a href="http://www.emanuelrighetto.it" title="Creazione Siti Internet Verona">Creazione Siti Internet Verona</a></span></p>
          </b-col>
        </b-row>
      </b-container>
    <!-- END FOOTER -->
  </div>
</template>

<script>
  export default {
    data() {
      return {
        images: {
          fb_footer: require('./assets/Facebook-Icon.png')
        }
      }
    },
    computed: {
      title: function () {
        return this.$route.meta.title
      }
    }
  }
</script>

<style lang="scss">
  @import 'node_modules/bootstrap/scss/bootstrap';
  @import 'node_modules/bootstrap-vue/src/index.scss';
  @import "styles/custom.scss";
</style>