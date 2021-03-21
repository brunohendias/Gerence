import apiCandidato from '@api/entidade/apiCandidato'
import apiAluno from '@api/entidade/apiAluno'
import apiSerie from '@api/entidade/apiSerie'
import apiTurno from '@api/entidade/apiTurno'
import apiTurma from '@api/entidade/apiTurma'
import apiDadosSerie from '@api/dados/apiDadosSerie'
import { mostraSwal, swalCatch } from '@helpers/helpers'

const serie = (self, serie) => {
    apiSerie.cadastra({ serie })
        .then(response => mostraSwal(response))
        .catch(() => swalCatch('essa série'))
}

const turno = (self, turno) => {
    apiTurno.cadastra({ turno })
        .then(response => mostraSwal(response))
        .catch(() => swalCatch('esse turno'))
}

const turma = (self, turma) => {
    apiTurma.cadastra({ turma })
        .then(response => mostraSwal(response))
        .catch(() => swalCatch('essa turma'))
}

const dadosSerie = (self, body) => {
    apiDadosSerie.cadastrar(body)
        .then(response => mostraSwal(response))
        .catch(() => swalCatch('os dados dessa série'))
}

const candidato = (self, body) => {
    apiCandidato.cadastra(body)
        .then(response => mostraSwal(response))
        .catch(() => swalCatch('esse candidato'))

    self.$store.dispatch('atualizaCandidato', body)

    self.$store.dispatch('atualizaQtdAlunosSerie', { pagina: 0, codigo: body.cod_serie_v, somar: true})
}

const aluno = (self, body) => {
    apiAluno.cadastra(body)
        .then(response => mostraSwal(response))
        .catch(() => swalCatch('esse aluno'))
}

export { serie, turno, turma, dadosSerie, candidato, aluno }