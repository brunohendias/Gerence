export default obj => {
    let i
    let vazio = false
    for (i in obj) {
        if (obj[i] == null || obj[i] == '') {
            vazio = true
            return vazio
        }
    }
}