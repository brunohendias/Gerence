import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import routes from './routes/routes'

export default new VueRouter({
	mode: 'history',
	base: __dirname,
  	routes
})