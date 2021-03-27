import axios from 'axios'

export default {
	busca () {
		return axios.get('/api/v1/user');
	},
	
	logout () {
		return axios.get('/api/v1/user/logout');
	}
}