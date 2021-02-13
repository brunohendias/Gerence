import Vue from 'vue'
import axios from 'axios'

export default {
	buscaTurmas(filtro) {
		return axios.get('/api/v1/turmas', filtro);
	}
}