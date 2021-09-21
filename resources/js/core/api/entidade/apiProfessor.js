import Api from '../Api'

class ApiProfessor extends Api {
	constructor(host) {
		super(host)
	}

    busca(params) {
		return this.get('professores', params);
	}
}

const apiProfessor = new ApiProfessor('/api/v1/');
export default apiProfessor;