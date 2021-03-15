import apiDadosSerie from '@api/dados/apiDadosSerie'
import { mostraSwal } from '@helpers/helpers'

const dadosSerie = (self, body) => {
    apiDadosSerie.editar(body, body.cod_serie_v)
        .then(response => mostraSwal(response))
        .catch(() => {
            swal({
                title: "Erro ao atualizar as informações dessa série.",
                icon: 'error'
            })
        })
}

export { dadosSerie }