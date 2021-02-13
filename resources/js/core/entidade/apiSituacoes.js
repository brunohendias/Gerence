import Vue from 'vue'
import axios from 'axios'

export default {
	buscaSituacoes() {
		return axios.get('/api/v1/situacoes');
	}
}