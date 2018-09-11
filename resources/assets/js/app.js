require('./bootstrap');

import router from './router'

import store from './store'

Vue.component('mainApp', require('./components/App.vue'));

const app = new Vue({
    el: '#store',
    store,
    router: router
});
