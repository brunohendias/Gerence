const CARREGA_INSCRICOES = 'CARREGA_INSCRICOES'
const INSCRICAO = 'INSCRICAO'
const ATUALIZA_INSCRICAO = 'ATUALIZA_INSCRICAO'

const state = {
	inscricoes: [],
	inscricao: {},
	total_registros: 0
}

const mutations = {
	[CARREGA_INSCRICOES] (state, value) {
		state.inscricoes = value.dados
		state.total_registros = value.total_registros
	},
	[INSCRICAO] (state, value) {
		state.inscricao = value
	},
	[ATUALIZA_INSCRICAO] (state, value) {
		state.inscricao = value
	}
}

const actions = {
	carregaInscricoes(context, value) {
		context.commit('CARREGA_INSCRICOES', value)
	},
	selecionaInscricao(context, value) {
		context.commit('INSCRICAO', value)
	},
	atualizaInscricao(context, value) {
		context.commit('ATUALIZA_INSCRICAO', value)
	}
}

export default { state, mutations, actions }