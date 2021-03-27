import apiInscricao from '@api/entidade/apiInscricao'
import apiCandidato from '@api/entidade/apiCandidato'
import apiAluno from '@api/entidade/apiAluno'
import apiSerie from '@api/entidade/apiSerie'
import apiTurno from '@api/entidade/apiTurno'
import apiTurma from '@api/entidade/apiTurma'
import apiProfessor from '@api/entidade/apiProfessor'
import apiAtencoes from '@api/entidade/apiAtencoes'
import apiSituacoes from '@api/entidade/apiSituacoes'
import { busca } from '@api/entidade/apiRelatorio'
import apiDadosProfessor from '@api/dados/apiDadosProfessor'
import apiDadosSerie from '@api/dados/apiDadosSerie'

import { load, validaRetornoLista } from '@helpers/helpers'

const turmas = (self, params) => {
    apiTurma.busca({params}).then(response => {
        if(response.data.success) {
            self.turmas = response.data.data.dados
        } else {
            self.msg = response.data.error.message
        }
    })
}

const turnos = (self, params) => {
    apiTurno.busca({params}).then(response => {
        if(response.data.success) {
            self.turnos = response.data.data.dados
        } else {
            self.msg = response.data.error.message
        }
    })
}

const series = (self, params) => {
    apiSerie.busca({params}).then(response => {
        if(response.data.success) {
            self.series = response.data.data.dados
        } else {
            self.msg = response.data.error.message
            self.series = [{cod_serie: null, serie: params ? params.serie : ''}]
        }
    })
}

const atencoes = (self, params) => {
    apiAtencoes.busca({params}).then(response => {
        if(response.data.success) {
            self.atencoes = response.data.data.dados
        } else {
            self.msg = response.data.error.message
        }
    })
}

const situacoes = (self, params) => {
    apiSituacoes.busca({params}).then(response => {
        if(response.data.success) {
            self.situacoes = response.data.data.dados
        } else {
            self.msg = response.data.error.message
        }
    })
}

const professores = (self, params) => {
    apiProfessor.busca({params}).then(response => {
        if(response.data.success) {
            self.professores = response.data.data.dados
        } else {
            self.msg = response.data.error.message
        }
    })
}
    
const dadosProfessores = (self, params) => {
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
}
    
const inscricoes = (self, params) => {
    load(self, true)

    apiInscricao.busca(params)
        .then(response => validaRetornoLista(self, 'carregaInscricoes', response))
        .catch(e => self.mostraMensagem({tipo: 'error', msg: e}))

    load(self, false)
}

const candidatos = (self, params) => {
    load(self, true)
    
    apiCandidato.busca(params)
        .then(response => validaRetornoLista(self, 'carregaCandidatos', response))
        .catch(e => self.mostraMensagem({tipo: 'error', msg: e}))
    
    load(self, false)
}

const alunos = (self, params) => {
    load(self, true)

    apiAluno.busca(params)
        .then(response => validaRetornoLista(self, 'carregaAlunos', response))
        .catch(e => self.mostraMensagem({tipo: 'error', msg: e}))
    
    load(self, false)
}

const dadosSeries = (self, params) => {
    load(self, true)

    let acao = 'carregaDadosSerie';

    if (self.acao) {
        acao = self.acao
    }
    
    apiDadosSerie.busca(params)
        .then(response => validaRetornoLista(self, acao, response))
        .catch(e => self.mostraMensagem({tipo: 'error', msg: e}))
    
    load(self, false)
}

const relatorios = relatorio => busca(relatorio)

export { 
    turmas, turnos, series, atencoes, situacoes, professores, 
    dadosProfessores, inscricoes, candidatos, alunos, dadosSeries,
    relatorios
}