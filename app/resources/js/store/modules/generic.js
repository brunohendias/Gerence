const ALTERA_FILTRO = 'ALTERA_FILTRO'

const state = {
    filtro: {}
}

const mutations = {
    [ALTERA_FILTRO] (state, value) {
        state.filtro = value
    }
}

const actions = {
    alteraFiltro(context, value) {
        context.commit('ALTERA_FILTRO', value)
    }
}