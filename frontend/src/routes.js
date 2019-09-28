// routes.js

import Home from './components/Home.vue';
import WhoWeAre from './components/WhoWeAre.vue';
import Services from './components/Services.vue';
import ServiceDetails from './components/ServiceDetails.vue';
import LaserScannerSurveys from './components/LaserScannerSurveys.vue';
import News from './components/News.vue'
import WhereWeAre from './components/WhereWeAre.vue'
import Contacts from "./components/Contacts.vue";

const routes = [
    {
        path: '/', component: Home, name: 'home', meta: {
            title: 'Rilievi con laser scanner, rilievo celerimetrico, rilievi topografici, rilievi gps - S.A.T. - Studio Associato di Topografia',
            metaTags: [
                {
                    name: 'description',
                    content: 'Rilievo con laser scanner 3D, rilievi gps, rilievo celerimetrico, rilievi topografici - S.A.T. - Studio Associato di Topografia'
                }]
        }
    },
    {path: '/chi-siamo', component: WhoWeAre, name: 'who_we_are'},
    {path: '/servizi', component: Services, name: 'services'},
    {path: '/servizi/:id', component: ServiceDetails, name: 'service_details', props: true},
    {path: '/rilievi-laser-scanner-3d', component: LaserScannerSurveys, name: 'laser_scanner_surveys'},
    {path: '/dove-siamo', component: WhereWeAre, name: 'where_we_are'},
    {path: '/contatti', component: Contacts, name: 'contacts'},
    {path: '/laser-scanner-3d-news/:id', component: News, name: 'news', props: true}
];

export default routes;