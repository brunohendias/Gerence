import apiCandidato from '@api/entidade/apiCandidato'

let icon = 'success'
let title = ''
export default {

    candidato(self, id, pagina) {
        apiCandidato.deleta(id).then(response => {
            if(response.data.success) {
                title = response.data.data.msg
                self.$store.dispatch('removeCandidato', {index: self.index, pagina})
            } else {
                title = response.data.error.message
                icon = 'error'
            }
            swal({ title, icon })
        }).catch(err => {
            console.log(err)
            swal({
                title: "Erro ao deletar esse candidato.",
                icon: 'error'
            })
        })
    }

}