import axios from 'axios'

export default {
	busca(params) {
		return axios.get('/api/v1/professores', params);
	}
}