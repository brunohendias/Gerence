import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import telas from './routes/telas'
import edicoes from './routes/edicoes'
import relatorios from './routes/relatorios'

const routes = [
	...telas, ...edicoes, ...relatorios
]

export default new VueRouter(
	{ mode: 'history', base: __dirname, routes }
)