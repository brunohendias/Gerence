import apiSerie from '../api/entidade/apiSerie'
import apiTurno from '../api/entidade/apiTurno'
import apiTurma from '../api/entidade/apiTurma'
import apiCandidato from '../api/entidade/apiCandidato'
import apiDadosSerie from '../api/dados/apiDadosSerie'

let icon = 'success'
let title = ''
export default {

    serie(self, serie) {
        apiSerie.cadastra({ serie }).then(response => {
            if(response.data.success) {
                title = response.data.data.msg
            } else {
                title = response.data.error.message
                icon = 'error'
            }
            swal({ title, icon })
        }).catch(err => {
            swal({
                title: "Erro ao cadastrar essa série.",
                icon: 'error'
            })
        })
    },

    turno(self, turno) {
        apiTurno.cadastra({ turno }).then(response => {
            if(response.data.success) {
                title = response.data.data.msg
            } else {
                title = response.data.error.message
                icon = 'error'
            }
            swal({ title, icon })
        }).catch(err => {
            swal({
                title: "Erro ao cadastrar esse turno.",
                icon: 'error'
            })
        })
    },

    turma(self, turma) {
        apiTurma.cadastra({ turma }).then(response => {
            if(response.data.success) {
                title = response.data.data.msg
            } else {
                title = response.data.error.message
                icon = 'error'
            }
            swal({ title, icon })
        }).catch(err => {
            swal({
                title: "Erro ao cadastrar essa turma.",
                icon: 'error'
            })
        })
    },

    dadosSerie(self, body) {
        apiDadosSerie.cadastrar(body).then(response => {
            if(response.data.success) {
                title = response.data.data.msg
            } else {
                title = response.data.error.message
                icon = 'error'
            }
            swal({ title, icon })
        }).catch(err => {
            swal({
                title: "Erro ao cadastrar essa série.",
                icon: 'error'
            })
        })
    },

    candidato (self, body) {
        apiCandidato.cadastra(body).then(response => {
            if(response.data.success) {
                title = response.data.data.msg
            } else {
                title = response.data.error.message
                icon = 'error'
            }
            swal({ title, icon })
        }).catch(err => {
            swal({
                title: "Erro ao atualizar essa inscrição",
                icon: 'error'
            })
        })
        self.$store.dispatch('atualizaCandidato', body)
    }
    
}