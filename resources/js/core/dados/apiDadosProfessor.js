import Vue from 'vue'
import axios from 'axios'

export default {
	buscaDadosProfessor() {
		return axios.get('/api/v1/professorvinculo');
	},

	buscaProfessores(filtro) {
		return axios.post('/api/v1/professorvinculo/professores', filtro); 
	}
}