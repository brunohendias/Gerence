import Api from '../Api'

class ApiAtencoes extends Api {
	constructor(host) {
		super(host)
	}

    busca(params) {
		return this.get('atencoes', params);
	}
}

const apiAtencoes = new ApiAtencoes('/api/v1/');
export default apiAtencoes;