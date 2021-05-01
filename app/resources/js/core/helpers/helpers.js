const msgObrigatorio = campo => 'O campo '+campo+' é obrigatorio'

const load = (self, value) => self.$store.dispatch('processando', value)

const swalCatch = string => swal({ title: 'Erro ao tentar cadastrar ' + string, icon: 'error' })

const limpaMsg = msg => { for (let i in msg) msg[i] = null }

const paginaArray = array => {
    let newArray = []
    const limite_por_pagina = 15
    const qtdPaginas = Math.ceil(array.length / limite_por_pagina)
    for (let i=0; i <= qtdPaginas; i++) newArray.push([])

    let qtd = 0
    let pagina = 0
    array.forEach(element => {
        if (qtd === limite_por_pagina){
            qtd = 0
            pagina += 1
        }
        qtd += 1
        newArray[pagina].push(element)
    });

    return newArray
}

const mostraMsg = (self, data) => {
    
    if (data.success) {
        self.dados = data.data.dados
        self.msg = data.data.msg
        self.tipo = 'success'
    } else {
        self.msg = data.error.message
        self.tipo = 'error'
    }
}

const msgCatch = (self, e) => {
    self.msg = e.message
    self.tipo = 'error'
}

const validaRetornoLista = (self, data) => {
    let total_registros, dados = []
    
    if(data.success) {
        self.tipo = 'successo'
        self.msg = data.data.msg

        dados = data.data.dados
        total_registros = dados.length
        dados = paginaArray(dados);
        self.$store.dispatch(self.acao, {dados, total_registros})
    } else {
        self.tipo = 'notfound'
        self.msg = data.error.message
    }
}

export {
    msgObrigatorio, load, swalCatch, limpaMsg,
    paginaArray, validaRetornoLista, mostraMsg,
    msgCatch
}