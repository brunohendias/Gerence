import Api from '../Api'

class Methods extends Api {
	constructor(host) {
		super(host)
	}

    busca(pathname, filtro) {
		return this.get(pathname, filtro);
	}

    cadastra(pathname, body){
		return this.post(pathname, body);
	}

    edita(pathname, id, body){
		return this.put(pathname + '/' + id, body);
	}

    delete(pathname, id){
		return this.put(pathname + '/' + id);
	}
}

const apiMethods = new Methods('/api/v1/');
export default apiMethods;