import Api from '../Api'

class ApiTurma extends Api {
	constructor(host) {
		super(host)
	}

    busca(params) {
		return this.get('turmas', params);
	}

	cadastra(body){
		return this.post('turmas', body);
	}
}

const apiTurma = new ApiTurma('/api/v1/');
export default apiTurma;