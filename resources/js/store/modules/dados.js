const CARREGA_DADOS_SERIE = 'CARREGA_DADOS_SERIE'
const CARREGA_SERIE = 'CARREGA_SERIE'
const ALTERA_ACAO = 'ALTERA_ACAO'

const state = {
    acao: 'cadastra',
    serie: {
        dadosSerie: [],
        total_registros: 0,
        serie: {
            serie: {},
            turno: {},
            turma: {}
        }
    },
    professor: {
        dadosProfessor: []
    }
}

const mutations = {
    [CARREGA_DADOS_SERIE] (state, value) {
        state.serie.dadosSerie = value.dados
		state.serie.total_registros = value.total_registros
	},
    [CARREGA_SERIE] (state, value) {
        state.serie.serie = value
    },
    [ALTERA_ACAO] (state, value) {
        state.acao = value
    }
}

const actions = {
    carregaDadosSerie(context, value) {
        context.commit('CARREGA_DADOS_SERIE', value)
    },
    carregaSerie(context, value) {
        context.commit('CARREGA_SERIE', value)
    },
    alteraAcao(context, value) {
        context.commit('ALTERA_ACAO', value)
    }
}

export default { state, mutations, actions }