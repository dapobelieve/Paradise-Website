import Vue from 'vue'

export const Home = Vue.component('Home', require('./Home.vue'));

export const Cart = Vue.component('Cart', require('./cart.vue'));

export const Info = Vue.component('Info', require('./info.vue'));

export const FunaabReg = Vue.component('FunaabReg', require('./Reg/RegHomeComponent.vue'));

export const PartTime  = Vue.component('PartTime', require('./Reg/ParttimeComponent.vue'));

export const PostGradute  = Vue.component('PostGradute', require('./Reg/PostGraduate.vue'));

export const PreDegree  = Vue.component('PreDegree', require('./Reg/PreDegree.vue'));


// payment component for registrations
export const Payment  = Vue.component('Payment', require('./Payment/PaymentComponent.vue'));