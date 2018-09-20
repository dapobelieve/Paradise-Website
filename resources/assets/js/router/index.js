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
    Info
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


