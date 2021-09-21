import Api from '../Api'

class ApiTurno extends Api {
    constructor(host) {
        super(host)
    }
    
    busca(params) {
		return this.get('turnos', params);
	}

	cadastra(body){
		return this.post('turnos', body);
	}
}

const apiTurno = new ApiTurno('/api/v1/');
export default apiTurno;