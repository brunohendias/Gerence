import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

import inscricoes from './modules/inscricoes'
import candidatos from './modules/candidatos'
import alunos from './modules/alunos'
import status from './modules/status'
import dados from './modules/dados'

const modules = {
    inscricoes, candidatos, alunos, status, dados
}

export default new Vuex.Store({ modules })