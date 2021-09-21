import Api from '../Api'

class ApiRelatorio extends Api {
	constructor(host) {
		super(host)
	}

    busca(relatorio) {
        window.location.replace('/api/v1/relatorio/' + relatorio)
	}
}

const apiRelatorio = new ApiRelatorio('/api/v1/');
export default apiRelatorio;