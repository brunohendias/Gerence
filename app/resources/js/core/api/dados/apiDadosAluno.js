import axios from 'axios'

export default {
	listarDadosAlunos() {
		return axios.get('/api/v1/dadosaluno/');
	},

	adicionarAluno(dados) {
		return axios.post('/api/v1/dadosaluno/', dados);
	},

	atualizarAluno(id, dados) {
		return axios.put('/api/v1/dadosaluno/'+id, dados);
	},

	deletarAluno(id) {
		return axios.delete('/api/v1/dadosaluno/'+id);
	}
}
