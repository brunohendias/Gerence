import Api from '../Api'

class ApiAluno extends Api {
	constructor(host) {
		super(host)
	}

    busca(filtro) {
		return this.post('aluno/busca', filtro);
	}

	cadastra(body){
		return this.post('aluno', body);
	}
}

const apiAluno = new ApiAluno('/api/v1/');
export default apiAluno;