const PROCESSANDO = 'PROCESSANDO'

const state = {
	processando: false
}

const mutations = {
	[PROCESSANDO] (state, value) {
		state.processando = value
	}
}

const actions = {
	processando(context, value) {
		context.commit('PROCESSANDO', value)
	}
}

export default { state, mutations, actions }