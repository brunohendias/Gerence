import axios from 'axios'

export default {
	busca(filtro) {
		return axios.post('/api/v1/aluno/busca', filtro);
	},

	gerarAluno(dados) {
		return axios.post('/api/v1/aluno', dados);
	}
}