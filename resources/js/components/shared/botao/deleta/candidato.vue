<template>
	<button class="btn btn-danger" @click="deletaCandidato" :disabled="deletando">
		<i v-if="deletando" class="spinner-border spinner-border-sm"></i>
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
	data() {
		return {
			deletando: false
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
					this.deletando = true
					
					let id = this.candidato.cod_can
					
					candidato(this, id)
					
					this.deletando = false
				}
			})
		}
	}
}
</script>