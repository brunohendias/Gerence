import axios from 'axios'

export default {
	listarAlunos(filtro) {
		return axios.post('/api/v1/aluno/busca', filtro);
	},

	gerarAluno(dados) {
		return axios.post('/api/v1/aluno', dados);
	}
}