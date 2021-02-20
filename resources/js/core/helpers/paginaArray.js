export default array => {
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