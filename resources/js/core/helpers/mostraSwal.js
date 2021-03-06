let title, icon

export default response => {
    if(response.data.success) {
        title = response.data.data.msg
        icon = 'success'
    } else {
        title = response.data.error.message
        icon = 'error'
    }
    swal({ title, icon })
}