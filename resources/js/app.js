/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import App from './App'
import router from './router/router'
import store from './store/store'

import 'vue-sidebar-menu/dist/vue-sidebar-menu.css'
import 'vue-sliding-pagination/dist/style/vue-sliding-pagination.css'
import 'vue-search-select/dist/VueSearchSelect.css'
import 'sweetalert'

// Mascara para inputs
import vueMask from 'di-vue-mask'
Vue.use(vueMask)

// Menu da aplicacao
import VueSidebarMenu from 'vue-sidebar-menu'
Vue.use(VueSidebarMenu)

// Ajax
import axios from 'axios'
Vue.use(axios)

const app = new Vue({
    el: '#app',
    components: { App },
    router,
    store
});
