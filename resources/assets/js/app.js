require('./bootstrap');

import router from './router'
import store from './store'
import Datetime from 'vue-datetime'
import '../../../node_modules/vue-datetime/dist/vue-datetime.css'
import 'vue2-dropzone/dist/vue2Dropzone.css';
import VueSweetalert2 from 'vue-sweetalert2';
import { format, formatDistanceToNow } from 'date-fns';


Vue.use(VueSweetalert2);

Vue.filter('fullDate', (value) => {
    return format(value, 'DD MMMM YYYY')
})

Vue.filter('customizedTime', (value) => {
    return formatDistanceToNow(new Date(value), { addSuffix: true });
})

// admin section
Vue.component('admin-app', require('./components/Admin/index.vue'));
Vue.component('mainApp', require('./components/App.vue'));
Vue.component('jamb', require('./components/Jamb.vue'));
Vue.component('solar', require('./components/Solar.vue'));
Vue.component('transact', require('./components/Admin/agent/Transact.vue'));
Vue.component('AgentDashboardComponent', require('./components/Admin/agent/AgentDashboard.vue'));
Vue.component('CashierDashboardComponent', require('./components/Admin/cashier/CashierDashboard.vue'));


Vue.use(Datetime);

const app = new Vue({
    el: '#store',
    store,
    router: router
});