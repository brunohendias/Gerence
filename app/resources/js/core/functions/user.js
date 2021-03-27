import apiUser from '@api/entidade/apiUser'

const show = self => apiUser.busca()
    .then(response => {
        if(response.data.success) {
            self.user = response.data.data.dados
        } else {
            self.msg = response.data.error.message
        }
    })

const logout = () => apiUser.logout()
    .then(response => {
        if(response.data.success) window.location.replace('/login')
    })

export { show, logout }