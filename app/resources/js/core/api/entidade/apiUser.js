import Api from '../Api'

class ApiUser extends Api {
    constructor(host) {
        super(host)
    }
    
    me() {
		return this.get('user');
    }
}

const apiUser = new ApiUser('/api/v1/');
export default apiUser;