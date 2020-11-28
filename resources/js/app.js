/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

//Import Vue Filter
require('./filter'); 

//Import progressbar
require('./progressbar'); 

//Setup custom events 
require('./customEvents'); 

//Import v-from
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('base-nav', require('./components/UI/BaseNav').default);
Vue.component('base-header', require('./components/UI/BaseHeader').default);
Vue.component('base-panel', require('./components/UI/BasePanel').default);
Vue.component('base-input', require('./components/UI/BaseInput').default);
Vue.component('base-button', require('./components/UI/BaseButton').default);
Vue.component('base-sidebar', require('./components/UI/BaseSidebar').default);
Vue.component('base-footer', require('./components/front/BaseFooter').default);
Vue.component('about-page', require('./components/front/aboutPage').default);
Vue.component('contactus-page', require('./components/front/contactusPage').default);
Vue.component('offers-page', require('./components/front/offersPage').default);
Vue.component('values-page', require('./components/front/valuesPage').default);
Vue.component('siteMap-page', require('./components/front/siteMapPage').default);
Vue.component('banner', require('./components/front/home/banner').default);
Vue.component('offers', require('./components/front/home/offers').default);
Vue.component('promise', require('./components/front/home/promise').default);
Vue.component('safety', require('./components/front/home/safety').default);
Vue.component('research', require('./components/front/booking/research').default);
Vue.component('book-header', require('./components/front/booking/bookheader').default);
Vue.component('no-cab', require('./components/front/booking/noCab').default);
Vue.component('cab-list', require('./components/front/booking/cabList').default);
Vue.component('operatordashboard', require('./components/admin/operator/dashboard').default);
Vue.component('routesandstations', require('./components/admin/operator/routesAndStations').default);
Vue.component('car', require('./components/admin/superAdmin/car').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});