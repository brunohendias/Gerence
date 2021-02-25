<template>
	<button class="btn btn-danger" @click="deletaCandidato">
		<i class="fas fa-trash"></i>
	</button>
</template>

<script>
import deleta from '@functions/deleta'

export default {
	name: 'botaoDeletaCandidato',
	props: {
		candidato: {
			type: Object
		},
		index: {
			type: Number,
			required: true
		},
		pagina: {
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
			let nom_can = this.candidato ? this.candidato.nom_can : this.candidatoAtual.nom_can
			let title = 'Deseja realmente excluir o candidato: '+nom_can+'?'
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
					let id = this.candidato ? this.candidato.cod_can : this.candidatoAtual.cod_can
					deleta.candidato(this, id, this.pagina)
				}
			})
		}
	}
}
</script>