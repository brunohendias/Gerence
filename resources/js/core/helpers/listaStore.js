import paginaArray from './paginaArray'

export default (self, acao, dados) => {
    let total_registros = dados.length
    dados = paginaArray(dados);
    self.$store.dispatch(acao, {dados, total_registros})
}