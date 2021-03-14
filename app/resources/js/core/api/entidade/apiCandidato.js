import axios from 'axios'

export default {
	busca(filtro) {
		return axios.post('/api/v1/candidato/busca', filtro);
	},

	cadastra(dados) {
		return axios.post('/api/v1/candidato', dados);
	},

	editarCandidato(id, dados) {
		return axios.put('/api/v1/candidato/'+id, dados);
	},

	deleta(id) {
		return axios.delete('/api/v1/candidato/'+id);
	}
}