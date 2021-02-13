<template>
	<button class="btn btn-danger" @click="deletaCandidato()">
		<i class="fas fa-trash"></i>
	</button>
</template>

<script>
import apiCandidato from '../../../core/entidade/apiCandidato'

export default {
	name: 'botaoDeletaCandidato',
	props: {
		candidato: {
			type: Object
		},
		index: {
			type: Number,
			required: true
		}
	},
	computed: {
		candidatoAtual() {
			return this.$store.state.candidatos.candidato 
		}
	},
	methods: {
		async deletaCandidato() {
			let nomcan = this.candidatoAtual ? this.candidatoAtual.nomcan : this.candidato.nomcan
			let title = 'Deseja realmente excluir o candidato: '+nomcan+'?'
			let icon = 'warning'
			swal({
				title,
				icon,
				buttons: [
					'não',
					'sim'
				]
			}).then(async willdelete => {
				if(willdelete) {
					let id = this.candidatoAtual ? this.candidatoAtual.codcan : this.candidato.codcan
					await apiCandidato.deletarCandidato(id).then(response => {
						if(response.data.success) {
							title = response.data.data.msg
							icon = 'success'
							this.candidatos.splice(this.index, 1)
						} else {
							title = response.data.error.message
							icon = 'error'
						}
						swal({
							title,
							icon
						})
					})
				}
			})
		}
	}
}
</script>