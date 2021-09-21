import apiCandidato from '@api/entidade/apiCandidato'
import apiAluno from '@api/entidade/apiAluno'
import apiSerie from '@api/entidade/apiSerie'
import apiTurno from '@api/entidade/apiTurno'
import apiTurma from '@api/entidade/apiTurma'
import apiDadosSerie from '@api/dados/apiDadosSerie'
import { mostraSwal, swalCatch, load } from '@helpers/helpers'

const serie = (self, serie) => {
    load(self, true)
    
    apiSerie.cadastra({ serie })
        .then(response => mostraSwal(response))
        .catch(() => swalCatch('essa série'))
    
    load(self, false)
}

const turno = (self, turno) => {
    load(self, true)
    
    apiTurno.cadastra({ turno })
        .then(response => mostraSwal(response))
        .catch(() => swalCatch('esse turno'))
    
    load(self, false)
}

const turma = (self, turma) => {
    load(self, true)

    apiTurma.cadastra({ turma })
        .then(response => mostraSwal(response))
        .catch(() => swalCatch('essa turma'))

    load(self, false)
}

const dadosSerie = (self, body) => {
    load(self, true)

    apiDadosSerie.cadastrar(body)
        .then(response => mostraSwal(response))
        .catch(() => swalCatch('os dados dessa série'))

    load(self, false)
}

const candidato = (self, body) => {
    load(self, true)

    apiCandidato.cadastra(body)
        .then(response => mostraSwal(response))
        .catch(() => swalCatch('esse candidato'))

    self.$store.dispatch('atualizaCandidato', body)

    self.$store.dispatch('atualizaQtdAlunosSerie', { pagina: 0, codigo: body.cod_serie_v, somar: true})

    load(self, false)
}

const aluno = (self, body) => {
    load(self, true)

    apiAluno.cadastra(body)
        .then(response => mostraSwal(response))
        .catch(() => swalCatch('esse aluno'))

    load(self, false)
}

export { serie, turno, turma, dadosSerie, candidato, aluno }