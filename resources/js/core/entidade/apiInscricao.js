import Vue from 'vue'
import axios from 'axios'

export default {
	buscarInscricao(id) {
		return axios.get('/api/v1/inscricao/'+id);
	},

	listarInscricoes(filtro) {
		return axios.post('/api/v1/inscricao/busca', filtro);
	},

	editarInscricao(id, dados) {
		return axios.put('/api/v1/inscricao/'+id, dados);
	}
}