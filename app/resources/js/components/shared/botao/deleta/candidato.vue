<template>
	<button class="btn btn-danger" @click="deletaCandidato" :disabled="processando">
        <span v-if="processando" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
		<i v-else class="fas fa-trash"></i>
	</button>
</template>

<script>
import { candidato } from '@functions/deleta'

export default {
	name: 'botaoDeletaCandidato',
	props: {
		candidato: {
			type: Object,
			required: true
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
		processando() {
			return this.$store.state.status.processando
		}
	},
	methods: {
		async deletaCandidato() {
			let nom_can = this.candidato.nom_can
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
					let id = this.candidato.cod_can
					
					candidato(this, id)
				}
			})
		}
	}
}
</script>