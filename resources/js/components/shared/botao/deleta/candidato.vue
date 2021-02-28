<template>
	<button class="btn btn-danger" @click="deletaCandidato" :disabled="deletando">
		<i v-if="deletando" class="spinner-border spinner-border-sm"></i>
		<i v-else class="fas fa-trash"></i>
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
	data() {
		return {
			deletando: false
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
					this.deletando = true
					let id = this.candidato ? this.candidato.cod_can : this.candidatoAtual.cod_can
					deleta.candidato(this, id, this.pagina)
					this.deletando = false
				}
			})
		}
	}
}
</script>