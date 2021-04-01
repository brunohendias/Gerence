import Api from './Api'

class Auth extends Api {
    constructor(host) {
        super(host)
    }

    login(body) {
        return this.post('login', body);
    }
}

const auth = new Auth('/');
export default auth;