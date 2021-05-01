import apiUser from '@api/entidade/apiUser'
import apiRelatorio from '@api/entidade/apiRelatorio'
import apiMethods from '@api/methods'

import { load, validaRetornoLista, mostraMsg, msgCatch } from '@helpers/helpers'
import { set } from '@functions/token'

const relatorios = relatorio => apiRelatorio.busca(relatorio)

const get = self => apiMethods.busca(self.pathname, self.filtro)
    .then(response => mostraMsg(self, response.data))
    .catch(e => msgCatch(self, e))

const lista = self => {
    load(self, true)
    
    apiMethods.busca(self.pathname, self.filtro)
        .then(response => validaRetornoLista(self, response.data))
        .catch(e => msgCatch(self, e))
    
    load(self, false)
}

const user = self => {
    let dados = {}
    
    apiUser.me().then(response => {
        if (response.data.success) {
            dados = response.data.data
            set(dados.token)
            self.start = true
        }
    })

    return dados
}

export { get, user, lista, relatorios }