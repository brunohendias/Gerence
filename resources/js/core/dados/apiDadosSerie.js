import Vue from 'vue'
import axios from 'axios'

export default {
	buscaDadosSerie(filtro) {
		return axios.post('/api/v1/serievinculo', filtro);
	},

	buscaSeries(filtro) {
		return axios.post('/api/v1/serievinculo/series', filtro);
	},

	buscaTurmas(filtro) {
		return axios.post('/api/v1/serievinculo/turmas', filtro)
	},
	
	buscaTurnos(filtro) {
		return axios.post('/api/v1/serievinculo/turnos', filtro)
	}
}