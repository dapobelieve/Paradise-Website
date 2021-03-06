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
 * Advanced search
 */
export const AdvancedSearch = Vue.component('advanced-search', require('./admin/SalesByDate'));

/**
 * Other dashboard pages
 */

export const CreateProperty = Vue.component('admin-create-property', require('./property/create'))
export const ListProperty = Vue.component('admin-list-property', require('./property/list'))
export const EditProperty = Vue.component('admin-edit-property', require('./property/edit'))

/**
 * Service dashboard pages
 */
export const CreateService = Vue.component('create-service', require('./service/create'))
export const ListService = Vue.component('list-service', require('./service/list'))
export const EditService = Vue.component('edit-service', require('./service/edit'))

