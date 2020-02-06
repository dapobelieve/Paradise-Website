import Vue from 'vue';

export const AdminIndex = Vue.component('admin-index', require('./index.vue'));

export const AdminStats = Vue.component('admin-stats', require('./admin/AdminDashboardComponent.vue'));
/**
 * Children of stats
 */
export const AdminToday = Vue.component('admin-today', require('./admin/AdminTodayComponent.vue'));
export const AdminYesterday = Vue.component('admin-yesterday', require('./admin/AdminYesterday.vue'));
export const AdminWeek = Vue.component('admin-week', require('./admin/AdminWeek.vue'));
export const AdminThirty = Vue.component('admin-thirty', require('./admin/AdminMonth.vue'));

/**
 * Other dashboard pages
 */

export const CreateProperty = Vue.component('admin-create-property', require('./property/create'))
export const ListProperty = Vue.component('admin-list-property', require('./property/list'))

