import Vue from 'vue'
import Vuex from 'vuex'

//importo o state e mutations
import inscricoes from './modules/inscricoes'
import candidatos from './modules/candidatos'
import alunos from './modules/alunos'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        inscricoes,
        candidatos,
        alunos
    }
})