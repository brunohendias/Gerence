import axios from 'axios'

export default {
	busca() {
		return axios.get('/api/v1/situacoes');
	}
}