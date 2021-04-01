import Api from '../Api'

class ApiSerie extends Api {
	constructor(host) {
		super(host)
	}

    busca(params) {
		return this.get('series', params);
	}

	cadastra(body){
		return this.post('series', body);
	}
}

const apiSerie = new ApiSerie('/api/v1/');
export default apiSerie;