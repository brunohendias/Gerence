import axios from 'axios'

export default {
	buscaDadosSerie() {
		return axios.get('/api/v1/serievinculo');
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