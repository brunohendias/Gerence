const CARREGA_CANDIDATOS = 'CARREGA_CANDIDATOS'
const CANDIDATO = 'CANDIDATO'
const ATUALIZA_CANDIDATO = 'ATUALIZA_CANDIDATO'
const ALTERA_PAGINA_CANDIDATO = 'ALTERA_PAGINA_CANDIDATO'

const state = {
	limitePorPagina: 10,
    pagina_atual: 0,
    total_registros: 0,
	candidatos: [[]],
	candidato: {}
}

const mutations = {
	[CARREGA_CANDIDATOS](state, value) {
		state.total_registros = value.length
		state.candidatos = [[]]
		let i = 0
    	let qtd_por_pagina = 0
    	for(let j in value) {
    		if (qtd_por_pagina == state.limitePorPagina) {
	    		qtd_por_pagina = 0
	    		i += 1
    			state.candidatos[i] = []
	    	}
	        state.candidatos[i].push(value[j])
	        qtd_por_pagina += 1
    	}
	},
	[CANDIDATO](state, value) {
		state.candidato = value
	},
	[ATUALIZA_CANDIDATO](state, value) {
		state.candidato = value
	},
	[ALTERA_PAGINA_CANDIDATO](state, value) {
		state.pagina_atual = value
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
	alteraPaginaCandidato(context, value) {
		context.commit('ALTERA_PAGINA_CANDIDATO', value)
	}
}

export default { state, mutations, actions }