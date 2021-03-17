import axios from 'axios'

export default {
	busca (params) {
		return axios.get('/api/v1/turnos', params);
	},

	cadastra(body) {
		return axios.post('/api/v1/turnos', body);
	}
}