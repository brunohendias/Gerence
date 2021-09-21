<template>
	<button class="btn btn-danger" @click="deletaCandidato">
		<load>
			<i class="fas fa-trash"></i>
		</load>
	</button>
</template>

<script>
import { candidato } from '@functions/deleta'
import load from '@shared/load'

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
	components: {
		load
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