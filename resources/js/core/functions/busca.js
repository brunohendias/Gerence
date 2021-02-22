import apiTurma from '@api/entidade/apiTurma'
import apiTurno from '@api/entidade/apiTurno'
import apiSerie from '@api/entidade/apiSerie'
import apiAtencoes from '@api/entidade/apiAtencoes'
import apiSituacoes from '@api/entidade/apiSituacoes'
import apiProfessor from '@api/entidade/apiProfessor'
import apiInscricao from '@api/entidade/apiInscricao'
import apiCandidato from '@api/entidade/apiCandidato'
import apiAluno from '@api/entidade/apiAluno'
import apiDadosProfessor from '@api/dados/apiDadosProfessor'
import apiDadosSerie from '@api/dados/apiDadosSerie'

import paginaArray from '@helpers/paginaArray'

export default {

    turmas(self, params) {
        apiTurma.busca({params}).then(response => {
            if(response.data.success) {
                self.turmas = response.data.data.turmas
            } else {
                self.msg = response.data.error.message
            }
        })
    },

    turnos(self, params) {
        apiTurno.busca({params}).then(response => {
            if(response.data.success) {
                self.turnos = response.data.data.turnos
            } else {
                self.msg = response.data.error.message
            }
        })
    },

    series(self, params) {
        apiSerie.busca({params}).then(response => {
            if(response.data.success) {
                self.series = response.data.data.series
            } else {
                self.msg = response.data.error.message
                self.series = [{cod_serie: null, serie: params ? params.serie : ''}]
            }
        })
    },

    atencoes(self, params) {
        apiAtencoes.busca({params}).then(response => {
            if(response.data.success) {
                self.atencoes = response.data.data.atencoes
            } else {
                self.msg = response.data.error.message
            }
        })
    },

    situacoes(self, params) {
        apiSituacoes.busca({params}).then(response => {
            if(response.data.success) {
                self.situacoes = response.data.data.situacoes
            } else {
                self.msg = response.data.error.message
            }
        })
    },

    professores(self, params) {
        apiProfessor.busca({params}).then(response => {
            if(response.data.success) {
                self.professores = response.data.data.professores
            } else {
                self.msg = response.data.error.message
            }
        })
    },
    
    dadosProfessores(self, params) {
        self.professores = []
        apiDadosProfessor.buscaProfessores(params).then(response => {
            if(response.data.success) {
                response.data.data.professores.map(professor => {
                    self.professores.push(professor.professor)
                })
            } else {
                self.msg = response.data.error.message
            }
        })
    },

    inscricoes(self, params) {
        apiInscricao.busca(params).then(response => {
            let dados = []
            if(response.data.success) {
                dados = response.data.data.inscricoes
                self.mostraMensagem({tipo: 'sucesso', msg: response.data.data.msg})
            } else {
                self.mostraMensagem({tipo: 'alerta', msg: response.data.error.message})
            }

            let total_registros = dados.length
			dados = paginaArray(dados);
			self.$store.dispatch('carregaInscricoes', {dados, total_registros})
        }).catch(e => {
            self.mostraMensagem({tipo: 'erro', msg: e})
        })
    },

    candidatos(self, params) {
        apiCandidato.busca(params).then(response => {
            let dados = []
            if(response.data.success) {
                dados = response.data.data.candidatos
                self.mostraMensagem({tipo: 'sucesso', msg: response.data.data.msg})
            } else {
                self.mostraMensagem({tipo: 'alerta', msg: response.data.error.message})
            }
            
            let total_registros = dados.length
			dados = paginaArray(dados);
			self.$store.dispatch('carregaCandidatos', {dados, total_registros})
        }).catch(e => {
            self.mostraMensagem({tipo: 'erro', msg: e})
        })
    },

    alunos(self, params) {
        apiAluno.busca(params).then(response => {
            let dados = []
            if (response.data.success) {
                dados = response.data.data.alunos
                self.mostraMensagem({tipo: 'sucesso', msg: response.data.data.msg})
            } else {
                self.mostraMensagem({tipo: 'alerta', msg: response.data.error.message})
            }

            let total_registros = dados.length
			dados = paginaArray(dados);
			self.$store.dispatch('carregaAlunos', {dados, total_registros})
        }).catch(e => {
            self.mostraMensagem({tipo: 'erro', msg: e})
        })
    },

    dadosSeries(self, params){
        apiDadosSerie.buscaInfos(params).then(response => {
            let dados = []
            if(response.data.success) {
                dados = response.data.data.dadosseries
                self.mostraMensagem({tipo: 'sucesso', msg: response.data.data.msg})
            } else {
                self.mostraMensagem({tipo: 'alerta', msg: response.data.error.message})
            }
            
            let total_registros = dados.length
			dados = paginaArray(dados);
			self.$store.dispatch('carregaDadosSerie', {dados, total_registros})
        }).catch(e => {
            self.mostraMensagem({tipo: 'erro', msg: e})
        })
    }
    
}