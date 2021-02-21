import axios from 'axios'

export default {
	buscaDadosProfessor() {
		return axios.get('/api/v1/professorvinculo');
	},

	buscaProfessores(params) {
		return axios.post('/api/v1/professorvinculo/professores', params);
	}
}