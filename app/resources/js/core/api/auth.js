import Api from './Api'

class Auth extends Api {
    constructor(host) {
        super(host)
    }

    loginSocial(provider) {
        return window.location.replace('/login/'+provider);
    }
}

const auth = new Auth('/');
export default auth;