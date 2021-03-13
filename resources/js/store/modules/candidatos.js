const CARREGA_CANDIDATOS = 'CARREGA_CANDIDATOS'
const CANDIDATO = 'CANDIDATO'
const ATUALIZA_CANDIDATO = 'ATUALIZA_CANDIDATO'
const REMOVE_CANDIDATO = 'REMOVE_CANDIDATO'
const CARREGA_SERIES_CANDIDATO = 'CARREGA_SERIES_CANDIDATO'
const ATUALIZA_QTD_ALUNOS_SERIE = 'ATUALIZA_QTD_ALUNOS_SERIE'

const state = {
	candidatos: [],
	candidato: {},
	total_registros: 0,
	series: []
}

const mutations = {
	[CARREGA_CANDIDATOS](state, value) {
		state.candidatos = value.dados
		state.total_registros = value.total_registros
	},
	[CANDIDATO](state, value) {
		state.candidato = value
	},
	[ATUALIZA_CANDIDATO](state, value) {
		state.candidato = value
	},
	[REMOVE_CANDIDATO](state, value) {
		state.candidatos[value.pagina].splice(value.index, 1)
	},
	[CARREGA_SERIES_CANDIDATO](state, value) {
		state.series = value.dados
	},
	[ATUALIZA_QTD_ALUNOS_SERIE] (state, value) {
        let serie = state.series[value.pagina].find(serie => serie.cod_serie_v == value.codigo)
        let qtd_alunos = serie.qtd_alunos
        
        if (value.somar) {
            qtd_alunos += 1
        } else {
            qtd_alunos -= 1
        }

        serie.qtd_alunos = qtd_alunos
    }
}

const actions = {
	carregaCandidatos(context, value) {
		context.commit('CARREGA_CANDIDATOS', value)
	},
	selecionaCandidato(context, value) {
		context.commit('CANDIDATO', value)
	},
	atualizaCandidato(context, value) {
		context.commit('ATUALIZA_CANDIDATO', value)
	},
	removeCandidato(context, value) {
		context.commit('REMOVE_CANDIDATO', value)
	},
	carregaSeriesCandidato(context, value) {
		context.commit('CARREGA_SERIES_CANDIDATO', value)
	},
	atualizaQtdAlunosSerie(context, value) {
        context.commit('ATUALIZA_QTD_ALUNOS_SERIE', value)
    }
}

export default { state, mutations, actions }