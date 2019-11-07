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
    AdminIndex, AdminStats, AdminToday, AdminYesterday
} from './../components/Admin/admin'

import {
    StudentList,
    Index,
    StudentDetails
} from './../components/Admin'


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
                path: '/today-analytics',
                component: AdminToday,
                name: 'admin-today'
            },
            {
                path: '/yesterday-analytics',
                component: AdminYesterday,
                name: 'admin-analytics-yesterday'
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
    {
        path: '',
        component: Index,
        children: [
            {
                path: '/list',
                component: StudentList,
                name: 'students-list'
            },
            {
                path: '/details/:studentId',
                component: StudentDetails,
                name: 'student-details'
            }
        ]
    }
];

const router = new Router({
    routes: routes
});

/**
 * Do all the beforeEach logics here
 */


/**
 * Export router
 */

export default router


