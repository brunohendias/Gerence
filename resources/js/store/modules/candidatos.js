const CARREGA_CANDIDATOS = 'CARREGA_CANDIDATOS'
const CANDIDATO = 'CANDIDATO'
const ATUALIZA_CANDIDATO = 'ATUALIZA_CANDIDATO'
const REMOVE_CANDIDATO = 'REMOVE_CANDIDATO'

const state = {
	candidatos: [],
	candidato: {},
	total_registros: 0
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
	}
}

export default { state, mutations, actions }