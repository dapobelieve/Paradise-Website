require('./bootstrap');

import router from './router'
import store from './store'
import Datetime from 'vue-datetime'
import '../../../node_modules/vue-datetime/dist/vue-datetime.css'
// import '../../../node_modules/vue-datetime/dist/vue-datetime.css'
import 'vue2-dropzone/dist/vue2Dropzone.css';

Vue.component('mainApp', require('./components/App.vue'));
Vue.use(Datetime);

const app = new Vue({
    el: '#store',
    store,
    router: router
});
