window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('home-component', require('./components/HomeComponent.vue').default);
Vue.component('main-component', require('./components/MainComponent.vue').default);
Vue.component('endai-component', require('./components/EndaiComponent.vue').default);
Vue.component('time-component', require('./components/TimeComponent.vue').default);
Vue.component('info-component', require('./components/InfoComponent.vue').default);
Vue.component('sponser-component', require('./components/SponserComponent.vue').default);
Vue.component('master-component', require('./components/MasterComponent.vue').default);
Vue.component('master-endai-component', require('./components/MasterEndaiComponent.vue').default);
Vue.component('master-time-component', require('./components/MasterTimeComponent.vue').default);
Vue.component('master-book-component', require('./components/MasterBookComponent.vue').default);
Vue.component('master-mail-component', require('./components/MasterMailComponent.vue').default);
Vue.component('master-invoice-component', require('./components/MasterInvoiceComponent.vue').default);
Vue.component('master-title-component', require('./components/MasterTitleComponent.vue').default);
Vue.component('master-mypage-component', require('./components/MasterMypageComponent.vue').default);
Vue.component('shared-menu-component', require('./components/SharedMenuComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#home',
});

