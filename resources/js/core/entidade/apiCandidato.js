import Vue from 'vue'
import axios from 'axios'

export default {
	listarCandidatos(filtro) {
		return axios.post('/api/v1/candidato/busca', filtro);
	},

	cadastrar(dados) {
		return axios.post('/api/v1/candidato', dados);
	},

	editarCandidato(id, dados) {
		return axios.put('/api/v1/candidato/'+id, dados);
	},

	deletarCandidato(id) {
		return axios.delete('/api/v1/candidato/'+id);
	}
}