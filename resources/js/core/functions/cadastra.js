import apiSerie from '@api/entidade/apiSerie'
import apiTurno from '@api/entidade/apiTurno'
import apiTurma from '@api/entidade/apiTurma'
import apiCandidato from '@api/entidade/apiCandidato'
import apiAluno from '@api/entidade/apiAluno'
import apiDadosSerie from '@api/dados/apiDadosSerie'
import mostraSwal from '@helpers/mostraSwal'
import swalCatch from '@helpers/swalCatch'

const methods = {

    serie(self, serie) {
        apiSerie.cadastra({ serie })
            .then(response => mostraSwal(response))
            .catch(() => swalCatch('essa série'))
    },

    turno(self, turno) {
        apiTurno.cadastra({ turno })
            .then(response => mostraSwal(response))
            .catch(() => swalCatch('esse turno'))
    },

    turma(self, turma) {
        apiTurma.cadastra({ turma })
            .then(response => mostraSwal(response))
            .catch(() => swalCatch('essa turma'))
    },

    dadosSerie(self, body) {
        apiDadosSerie.cadastrar(body)
            .then(response => mostraSwal(response))
            .catch(() => swalCatch('os dados dessa série'))
    },

    candidato (self, body) {
        apiCandidato.cadastra(body)
            .then(response => mostraSwal(response))
            .catch(() => swalCatch('esse candidato'))

        self.$store.dispatch('atualizaCandidato', body)
    },

    aluno (self, body) {
        apiAluno.cadastra(body)
            .then(response => mostraSwal(response))
            .catch(() => swalCatch('esse aluno'))
    }
}

export default methods