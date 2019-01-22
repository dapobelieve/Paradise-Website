import Vue from 'vue'
/**
 * Here we import vue router first
 */

import Router from 'vue-router'

Vue.use(Router)

/**
 * import components to be used
 */

import {
    Home,
    Cart,
    Info,
    FunaabReg,
    PartTime,
    PostGradute,
    Payment
} from './../components'


const routes = [
    {
        path: '/',
        component: Home,
        name: 'home'
    },
    {
        path: '/cart',
        component: Cart,
        name: 'cart'
    },
    {
        path: '/funaab-registrations',
        component: FunaabReg,
        name: 'funaab-reg'
    },
    {
        path: '/part-time-registrations',
        component: PartTime,
        name: 'part-time'
    },
    {
        path: '/post-graduate-registration',
        component: PostGradute,
        name: 'post-graduate'
    },
    {
        path: '/info',
        component: Info,
        name: 'info'
    },
    {
        path: '/pay/:id',
        component: Payment,
        name: 'regPay'
    }
];

const router = new Router({
    routes: routes
})

/**
 * Do all the beforeEach logics here
 */



/**
 * Export router
 */

export default router


