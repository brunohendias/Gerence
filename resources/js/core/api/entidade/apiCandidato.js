import Api from '../Api'

class ApiCandidato extends Api {
	constructor(host) {
		super(host)
	}

    busca(filtro) {
		return this.post('candidato/busca', filtro);
	}

	cadastra(body){
		return this.post('candidato', body);
	}

	editarCandidato(id, dados) {
		return this.put('candidato/'+id, dados);
	}

	deleta(id) {
		return this.delete('candidato/'+id);
	}
}

const apiCandidato = new ApiCandidato('/api/v1/');
export default apiCandidato;