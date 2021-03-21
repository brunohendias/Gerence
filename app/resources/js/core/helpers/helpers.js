const limpaMsg = msg => {
    let i

    for (i in msg) {
        msg[i] = null
    }

    return msg
}

const emptyKey = obj => {
    let i, vazio = false

    for (i in obj) {
        if (obj[i] == null || obj[i] == '') {
            vazio = true
            return vazio
        }
    }
}

const load = (self, value) => {
    self.$store.dispatch('buscando', value)
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
    
    let pagina = 0
    
    let qtd_por_pagina = 0
    
    newArray.push([])
    
    array.map(dado => {
        if (qtd_por_pagina == 10) {
            qtd_por_pagina = 0
            pagina += 1
            newArray[pagina] = []
        }
        newArray[pagina].push(dado)
        qtd_por_pagina += 1
    })

    return newArray
}

const swalCatch = string => {
    swal({
        title: 'Erro ao tentar cadastrar ' + string,
        icon: 'error'
    })
}

const validaRetornoLista = (self, acao, resp) => {
    let tipo, msg, total_registros, dados = []
    
    if(resp.data.success) {
        dados = resp.data.data.dados
        tipo = 'successo'
        msg = resp.data.data.msg
    
    } else {
        tipo = 'notfound'
        msg = resp.data.error.message
    }

    if (!self.lista) {
        self.mostraMensagem({tipo, msg})
    }
    
    total_registros = dados.length
    
    dados = paginaArray(dados);
    
    self.$store.dispatch(acao, {dados, total_registros})
}

export {
    limpaMsg, emptyKey, load, mostraSwal, paginaArray, swalCatch, validaRetornoLista
}