import auth from '@api/auth'

const loginSocial = provider => auth.loginSocial(provider)

export { loginSocial }