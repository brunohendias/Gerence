import apiCandidato from '@api/entidade/apiCandidato'

let icon = 'success'
let title = ''
const methods = {

    candidato(self, id) {
        apiCandidato.deleta(id).then(response => {
            if(response.data.success) {
                title = response.data.data.msg
                self.$store.dispatch('removeCandidato', {index: self.index, pagina: self.pagina})
            } else {
                title = response.data.error.message
                icon = 'error'
            }
            swal({ title, icon })
        }).catch(() => {
            swal({
                title: "Erro ao deletar esse candidato.",
                icon: 'error'
            })
        })
    }
}

export default methods