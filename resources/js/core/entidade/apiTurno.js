import axios from 'axios'

export default {
	buscaTurnos(filtro) {
		return axios.get('/api/v1/turnos', filtro);
	}
}