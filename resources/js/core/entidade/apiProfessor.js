import Vue from 'vue'
import axios from 'axios'

export default {
	buscaProfessores(filtro) {
		return axios.get('/api/v1/professores', filtro);
	}
}