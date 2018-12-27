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
    PartTime
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
        path: '/parttime-registrations',
        component: PartTime,
        name: 'part-time'
    },
    {
        path: '/info',
        component: Info,
        name: 'info'
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


