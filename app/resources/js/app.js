require('./bootstrap');

import Vue from 'vue'
import App from './App'
import Login from '@tela/Login'
import router from './router/router'
import store from './store/store'
import vueMask from 'di-vue-mask'
import VueSidebarMenu from 'vue-sidebar-menu'
import 'vue-search-select/dist/VueSearchSelect.css'
import 'sweetalert'
import 'vue-sidebar-menu/dist/vue-sidebar-menu.css'

Vue.use(vueMask)
Vue.use(VueSidebarMenu)
const app = new Vue (
    { el: '#app', components: { App, Login }, router, store }
);