import apiCandidato from '@api/entidade/apiCandidato'
import { load } from '@helpers/helpers'

let icon = 'success'
let title = ''

const candidato = (self, id) => {
    load(self, true)

    apiCandidato.deleta(id).then(response => {
        if(response.data.success) {
            title = response.data.data.msg
            icon = 'success'
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

    load(self, false)
}

export { candidato }