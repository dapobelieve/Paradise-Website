import Vue from 'vue';

export const AdminIndex = Vue.component('admin-index', require('./index.vue'));
export const AdminStats = Vue.component('admin-stats', require('./AdminDashboardComponent.vue'));
export const AdminToday = Vue.component('admin-today', require('./AdminTodayComponent.vue'));
export const AdminYesterday = Vue.component('admin-yesterday', require('./AdminYesterday.vue'));
export const AdminWeek = Vue.component('admin-week', require('./AdminWeek.vue'));
export const AdminThirty = Vue.component('admin-thirty', require('./AdminMonth.vue'));