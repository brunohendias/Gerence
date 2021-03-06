export default string => {
    swal({
        title: 'Erro ao tentar cadastrar ' + string,
        icon: 'error'
    })
}