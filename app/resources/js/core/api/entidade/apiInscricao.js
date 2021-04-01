import Api from '../Api'

class ApiInscricao extends Api {
	constructor(host) {
		super(host)
	}

    buscarInscricao(id) {
		return this.get('inscricao/'+id);
	}

	busca(filtro) {
		return this.post('inscricao/busca', filtro);
	}

	editarInscricao(id, dados) {
		return this.put('inscricao/'+id, dados);
	}
}

const apiInscricao = new ApiInscricao('/api/v1/');
export default apiInscricao;