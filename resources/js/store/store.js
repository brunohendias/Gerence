import Vue from 'vue'
import Vuex from 'vuex'

// importe dos states
import inscricoes from './modules/inscricoes'
import candidatos from './modules/candidatos'
import alunos from './modules/alunos'
import dados from './modules/dados'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        inscricoes,
        candidatos,
        alunos,
        dados
    }
})