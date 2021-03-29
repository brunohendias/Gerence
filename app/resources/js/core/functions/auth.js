class Auth {
    _getToken() {
        let token = window.location.pathname.replace('/', '')
        if (token) {
            this.set(token);
        }
    }

    set(token) {
        localStorage.setItem('_san', token)
    }

    get() { 
        return `Bearer ${localStorage.getItem('_san')}`
    }
}

export default new Auth();