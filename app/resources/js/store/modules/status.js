const BUSCANDO = 'BUSCANDO'

const state = {
	buscando: false
}

const mutations = {
	[BUSCANDO] (state, value) {
		state.buscando = value
	}
}

const actions = {
	buscando(context, value) {
		context.commit('BUSCANDO', value)
	}
}

export default { state, mutations, actions }