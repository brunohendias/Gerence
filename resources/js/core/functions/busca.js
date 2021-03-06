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

import listaStore from '@helpers/listaStore'
import load from '@helpers/load'

let dados = []
const methods = {

    turmas(self, params) {
        apiTurma.busca({params}).then(response => {
            if(response.data.success) {
                self.turmas = response.data.data.dados
            } else {
                self.msg = response.data.error.message
            }
        })
    },

    turnos(self, params) {
        apiTurno.busca({params}).then(response => {
            if(response.data.success) {
                self.turnos = response.data.data.dados
            } else {
                self.msg = response.data.error.message
            }
        })
    },

    series(self, params) {
        apiSerie.busca({params}).then(response => {
            if(response.data.success) {
                self.series = response.data.data.dados
            } else {
                self.msg = response.data.error.message
                self.series = [{cod_serie: null, serie: params ? params.serie : ''}]
            }
        })
    },

    atencoes(self, params) {
        apiAtencoes.busca({params}).then(response => {
            if(response.data.success) {
                self.atencoes = response.data.data.dados
            } else {
                self.msg = response.data.error.message
            }
        })
    },

    situacoes(self, params) {
        apiSituacoes.busca({params}).then(response => {
            if(response.data.success) {
                self.situacoes = response.data.data.dados
            } else {
                self.msg = response.data.error.message
            }
        })
    },

    professores(self, params) {
        apiProfessor.busca({params}).then(response => {
            if(response.data.success) {
                self.professores = response.data.data.dados
            } else {
                self.msg = response.data.error.message
            }
        })
    },
    
    dadosProfessores(self, params) {
        self.professores = []
        apiDadosProfessor.buscaProfessores(params).then(response => {
            if(response.data.success) {
                response.data.data.dados.map(professor => {
                    self.professores.push(professor.professor)
                })
            } else {
                self.msg = response.data.error.message
            }
        })
    },

    inscricoes(self, params) {
        load(self, true)
        dados = []
        apiInscricao.busca(params).then(response => {
            if(response.data.success) {
                dados = response.data.data.dados
                self.mostraMensagem({tipo: 'successo', msg: response.data.data.msg})
            } else {
                self.mostraMensagem({tipo: 'notfound', msg: response.data.error.message})
            }

            listaStore(self, 'carregaInscricoes', dados)
        }).catch(e => {
            self.mostraMensagem({tipo: 'error', msg: e})
        })
        load(self, false)
    },

    candidatos(self, params) {
        load(self, true)
        dados = []
        apiCandidato.busca(params).then(response => {
            if(response.data.success) {
                dados = response.data.data.dados
                self.mostraMensagem({tipo: 'successo', msg: response.data.data.msg})
            } else {
                self.mostraMensagem({tipo: 'notfound', msg: response.data.error.message})
            }
            
            listaStore(self, 'carregaCandidatos', dados)
        }).catch(e => {
            self.mostraMensagem({tipo: 'error', msg: e})
        })
        load(self, false)
    },

    alunos(self, params) {
        load(self, true)
        dados = []
        apiAluno.busca(params).then(response => {
            if (response.data.success) {
                dados = response.data.data.dados
                self.mostraMensagem({tipo: 'successo', msg: response.data.data.msg})
            } else {
                self.mostraMensagem({tipo: 'notfound', msg: response.data.error.message})
            }

            listaStore(self, 'carregaAlunos', dados)
        }).catch(e => {
            self.mostraMensagem({tipo: 'error', msg: e})
        })
        load(self, false)
    },

    dadosSeries(self, params){
        dados = []
        apiDadosSerie.busca(params).then(response => {
            if(response.data.success) {
                dados = response.data.data.dados
                self.mostraMensagem({tipo: 'successo', msg: response.data.data.msg})
            } else {
                self.mostraMensagem({tipo: 'notfound', msg: response.data.error.message})
            }
            
            listaStore(self, 'carregaDadosSerie', dados)
        }).catch(e => {
            self.mostraMensagem({tipo: 'error', msg: e})
        })
    },

    dadosSerie(self, params) {
        apiDadosSerie.busca(params).then(response => {
            self.turmas = []
            self.professores = []
            if(response.data.success) {
                dados = response.data.data.dados
                dados.map(dado => {
                    self.serie_v = dado.cod_serie_v
                    self.turmas.push(dado.turma)
                    self.professores.push(dado.professor)
                })
            }
        })
    }
}

export default methods