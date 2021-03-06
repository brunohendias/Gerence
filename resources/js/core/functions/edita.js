import apiDadosSerie from '@api/dados/apiDadosSerie'

let icon = 'success'
let title = ''
const methods = {

    dadosSerie(self, body) {
        apiDadosSerie.editar(body, body.cod_serie_v).then(response => {
            if(response.data.success) {
                title = response.data.data.msg
            } else {
                title = response.data.error.message
                icon = 'error'
            }
            swal({ title, icon })
        }).catch(() => {
            swal({
                title: "Erro ao atualizar as informações dessa série.",
                icon: 'error'
            })
        })
    }
}

export default methods