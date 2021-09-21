import apiDadosSerie from '@api/dados/apiDadosSerie'
import { mostraSwal, load } from '@helpers/helpers'

const dadosSerie = (self, body) => {
    load(self, true)

    apiDadosSerie.editar(body, body.cod_serie_v)
        .then(response => mostraSwal(response))
        .catch(() => {
            swal({
                title: "Erro ao atualizar as informações dessa série.",
                icon: 'error'
            })
        })
    
    load(self, false)
}

export { dadosSerie }