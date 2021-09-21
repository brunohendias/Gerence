const msgObrigatorio = campo => 'O campo '+campo+' é obrigatorio'

const load = (self, value) => self.$store.dispatch('processando', value)

const swalCatch = string => swal({ title: 'Erro ao tentar cadastrar ' + string, icon: 'error' })

const limpaMsg = msg => {
    for (let i in msg) msg[i] = null
}

const mostraSwal = response => {
    let title, icon
    
    if(response.data.success) {
        title = response.data.data.msg
        icon = 'success'
    } else {
        title = response.data.error.message
        icon = 'error'
    }
    
    swal({ title, icon })
}

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

const validaRetornoLista = (self, acao, resp) => {
    let tipo, msg, total_registros, dados = []
    
    if(resp.data.success) {
        dados = resp.data.data.dados
        tipo = 'successo'
        msg = resp.data.data.msg
        total_registros = dados.length
        dados = paginaArray(dados);
        self.$store.dispatch(acao, {dados, total_registros})
    } else {
        tipo = 'notfound'
        msg = resp.data.error.message
    }

    if (!self.lista) {
        self.mostraMensagem({tipo, msg})
    }
}

export {
    msgObrigatorio, load, swalCatch, limpaMsg,
    mostraSwal, paginaArray, validaRetornoLista, 
}