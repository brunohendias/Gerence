import axios from 'axios'

export default class Api {
    constructor(host) {
        this._host = host
    }

    _getAccessToken() {
        let token = 'Bearer 30|hnGIqWs3TPgdTio3FjmWMq5FU2XFZEQDD0TAcI77'

        return token
    }

    _setHeaderAutorization() {
        let headers = { Authorization: this._getAccessToken() }
        
        return headers
    }

    _request(method = 'get', path, data = {}) {
        let headers = this._setHeaderAutorization()
        let url = this._host + path
        
        return axios({ method, url, data, headers })
    }

    get(path, params) { 
        return this._request('get', path, params)
    }

    post(path, body) {
        return this._request('post', path, body)
    }

    put(path, body) {
        return this._request('put', path, body)
    }

    delete(path) {
        return this._request('delete', path)
    }
}