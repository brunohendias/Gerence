const CARREGA_ALUNOS = 'CARREGA_ALUNOS'
const ALUNO = 'ALUNO'
const ATUALIZA_ALUNO = 'ATUALIZA_ALUNO'

const state = {
	alunos: [],
	aluno: {},
	total_registros: 0
}

const mutations = {
	[CARREGA_ALUNOS](state, value) {
		state.alunos = value.dados
		state.total_registros = value.total_registros
	},
	[ALUNO](state, value) {
		state.aluno = value
	},
	[ATUALIZA_ALUNO](state, value) {
		state.aluno = value
	}
}

const actions = {
	carregaAlunos(context, value) {
		context.commit('CARREGA_ALUNOS', value)
	},
	selecionaAluno(context, value) {
		context.commit('ALUNO', value)
	},
	atualizaAluno(context, value) {
		context.commit('ATUALIZA_ALUNO', value)
	}
}

export default { state, mutations, actions }