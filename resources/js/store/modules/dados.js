const CARREGA_DADOS_SERIE = 'CARREGA_DADOS_SERIE'

const state = {
    serie: {
        dadosSerie: [],
        total_registros: 0
    },
    professor: {
        dadosProfessor: []
    }
}

const mutations = {
    [CARREGA_DADOS_SERIE](state, value) {
        state.serie.dadosSerie = value.dados
		state.serie.total_registros = value.total_registros
	}
}

const actions = {
    carregaDadosSerie(context, value) {
        context.commit('CARREGA_DADOS_SERIE', value)
    }
}

export default { state, mutations, actions }