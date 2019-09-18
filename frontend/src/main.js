import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
import App from './App.vue'
import VueRouter from 'vue-router';
import routes from './routes';
import {library} from '@fortawesome/fontawesome-svg-core'
import {faUserSecret} from '@fortawesome/free-solid-svg-icons'
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'

library.add(faUserSecret);

Vue.config.productionTip = false;

Vue.component('font-awesome-icon', FontAwesomeIcon);
Vue.use(VueRouter);
Vue.use(BootstrapVue);

const router = new VueRouter({mode: 'history', routes});

new Vue({
    router,
    render: h => h(App)
}).$mount('#app');