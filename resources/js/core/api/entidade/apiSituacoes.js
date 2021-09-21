import Api from '../Api'

class ApiSituacoes extends Api {
	constructor(host) {
		super(host)
	}

    busca(params) {
		return this.get('situacoes', params);
	}
}

const apiSituacoes = new ApiSituacoes('/api/v1/');
export default apiSituacoes;