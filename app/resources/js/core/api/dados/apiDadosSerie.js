import axios from 'axios'

export default {
	busca(filter) {
		return axios.post('/api/v1/serievinculo/busca', filter);
	},

	cadastrar(body) {
		return axios.post('/api/v1/serievinculo', body);
	},

	editar(body, id) {
		return axios.put('/api/v1/serievinculo/'+id, body);
	}
}