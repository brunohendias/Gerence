const CARREGA_INSCRICOES = 'CARREGA_INSCRICOES'
const INSCRICAO = 'INSCRICAO'
const ATUALIZA_INSCRICAO = 'ATUALIZA_INSCRICAO'
const ALTERA_PAGINA_INSCRICAO = 'ALTERA_PAGINA_INSCRICAO'

const state = {
    limitePorPagina: 10,
    pagina_atual: 0,
    total_registros: 0,
	inscricoes: [[]],
	inscricao: {}
}

const mutations = {
	[CARREGA_INSCRICOES](state, value) {
		state.total_registros = value.length
		state.inscricoes = [[]]
		let i = 0
    	let qtd_por_pagina = 0
    	for(let j in value) {
    		if (qtd_por_pagina == state.limitePorPagina) {
	    		qtd_por_pagina = 0
	    		i += 1
    			state.inscricoes[i] = []
	    	}
	        state.inscricoes[i].push(value[j])
	        qtd_por_pagina += 1
    	}
	},
	[INSCRICAO](state, value) {
		state.inscricao = value
	},
	[ATUALIZA_INSCRICAO](state, value) {
		state.inscricao = value
	},
	[ALTERA_PAGINA_INSCRICAO](state, value) {
		state.pagina_atual = value
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
	},
	alteraPaginaInscricao(context, value) {
		context.commit('ALTERA_PAGINA_INSCRICAO', value)
	}
}

export default { state, mutations, actions }