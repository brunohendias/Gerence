import axios from 'axios'

export default {
	buscaSeries(filtro) {
		return axios.get('/api/v1/series', filtro);
	}
}