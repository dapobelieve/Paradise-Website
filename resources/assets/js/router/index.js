import Vue from 'vue'
/**
 * Here we import vue router first
 */

import Router from 'vue-router'

Vue.use(Router);

/**
 * import components to be used */

import {
    Home,
    Cart,
    Info,
    FunaabReg,
    PartTime,
    PostGradute,
    PreDegree,
    Payment
} from './../components'

import {
    AdminIndex, AdminStats, AdminToday, AdminYesterday, AdminThirty, CreateProperty, ListProperty, EditProperty
} from './../components/Admin/'

import AdminWeek from "../components/Admin/admin/AdminWeek";
import AdminMonth from "../components/Admin/admin/AdminMonth";


const routes = [
    {
        path: '/',
        component: Home,
        name: 'home'
    },
    {
        path: '',
        component: AdminIndex,
        children: [
            {
                path: '/stats',
                component: AdminStats,
                name: 'admin-stats'
            },
            {
                path: '/stats/today-analytics',
                component: AdminToday,
                name: 'admin-today'
            },
            {
                path: '/stats/yesterday-analytics',
                component: AdminYesterday,
                name: 'admin-analytics-yesterday'
            },
            {
                path: '/stats/week-analytics',
                component: AdminWeek,
                name: 'admin-analytics-week'
            },
            {
                path: '/stats/last-30-days-analytics',
                component: AdminThirty,
                name: 'admin-analytics-30'
            },
            {
                name: 'create-property',
                component: CreateProperty,
                path: '/create-property'
            },
            {
                name: 'all-property',
                component: ListProperty,
                path: '/list-property'
            },
            {
                path: "/property/:id/edit",
                name: 'edit-property',
                component: EditProperty
            }
        ]
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
        path: '/pre-degree',
        component: PreDegree,
        name: 'pre-degree'
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
    },
];

const router = new Router({
    routes: routes
});

/**
 * Do all the beforeEach logics here
 */
//
// router.beforeEach((to, from, next) => {
//     console.log(to)
//     next();
// })
/**
 * Export router
 */

export default router


