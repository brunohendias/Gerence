import axios from 'axios'

export default {
	buscaDadosSerie() {
		return axios.get('/api/v1/serievinculo');
	},

	buscaInfos(filtro) {
		return axios.post('/api/v1/serievinculo/infos', filtro);
	},

	buscaSeries(filtro) {
		return axios.post('/api/v1/serievinculo/series', filtro);
	},

	buscaTurmas(filtro) {
		return axios.post('/api/v1/serievinculo/turmas', filtro);
	},
	
	buscaTurnos(filtro) {
		return axios.post('/api/v1/serievinculo/turnos', filtro);
	},

	cadastrar(body) {
		return axios.post('/api/v1/serievinculo', body);
	},

	editar(body, id) {
		return axios.put('/api/v1/serievinculo/'+id, body);
	}
}