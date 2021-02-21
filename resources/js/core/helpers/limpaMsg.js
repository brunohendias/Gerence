export default msg => {
    let i
    for (i in msg) {
        msg[i] = null
    }
    return msg
}