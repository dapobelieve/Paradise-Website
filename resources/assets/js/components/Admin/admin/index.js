import Vue from 'vue';

export const AdminIndex = Vue.component('admin-index', require('./index.vue'));
export const AdminStats = Vue.component('admin-stats', require('./AdminDashboardComponent.vue'));
export const AdminToday = Vue.component('admin-today', require('./AdminTodayComponent.vue'));
export const AdminYesterday = Vue.component('admin-today', require('./AdminYesterday.vue'));