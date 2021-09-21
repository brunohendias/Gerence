import Api from '../Api'

class ApiDadosSerie extends Api {
    constructor(host) {
        super(host)
    }
    
	busca(filter) {
		return this.post('serievinculo/busca', filter);
	}

	cadastrar(body) {
		return this.post('serievinculo', body);
	}

	editar(body, id) {
		return this.put('serievinculo/'+id, body);
	}
}

const apiDadosSerie = new ApiDadosSerie('/api/v1/');
export default apiDadosSerie;