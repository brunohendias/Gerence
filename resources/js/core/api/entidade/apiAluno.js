import axios from 'axios'

export default {
	busca(filtro) {
		return axios.post('/api/v1/aluno/busca', filtro);
	},

	cadastra(body) {
		return axios.post('/api/v1/aluno', body);
	}
}