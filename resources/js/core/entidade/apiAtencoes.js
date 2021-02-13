import Vue from 'vue'
import axios from 'axios'

export default {
	buscaAtencoes() {
		return axios.get('/api/v1/atencoes');
	}
}