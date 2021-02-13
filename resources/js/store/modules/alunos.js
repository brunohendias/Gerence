const CARREGA_ALUNOS = 'CARREGA_ALUNOS'
const ALUNO = 'ALUNO'
const ATUALIZA_ALUNO = 'ATUALIZA_ALUNO'
const ALTERA_PAGINA_ALUNO = 'ALTERA_PAGINA_ALUNO'

const state = {
	limitePorPagina: 10,
    pagina_atual: 0,
    total_registros: 0,
	alunos: [[]],
	aluno: {}
}

const mutations = {
	[CARREGA_ALUNOS](state, value) {
		state.total_registros = value.length
		state.alunos = [[]]
		let i = 0
    	let qtd_por_pagina = 0
    	for(let j in value) {
    		if (qtd_por_pagina == state.limitePorPagina) {
	    		qtd_por_pagina = 0
	    		i += 1
    			state.alunos[i] = []
	    	}
	        state.alunos[i].push(value[j])
	        qtd_por_pagina += 1
    	}
	},
	[ALUNO](state, value) {
		state.aluno = value
	},
	[ATUALIZA_ALUNO](state, value) {
		state.aluno = value
	},
	[ALTERA_PAGINA_ALUNO](state, value) {
		state.pagina_atual = value
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
	},
	alteraPaginaAluno(context, value) {
		context.commit('ALTERA_PAGINA_ALUNO', value)
	}
}

export default { state, mutations, actions }