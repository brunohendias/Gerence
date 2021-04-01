import auth from '@api/auth'
import { set } from '@functions/token'

const login = (self, dados) => auth.login(dados)
    .then(response => {
        if (response.data.success) {
            set(response.data.data.token)
            window.location.replace('/')
        }
    }).catch(e => self.$emit('error', e.response.data.errors) )

export { login }