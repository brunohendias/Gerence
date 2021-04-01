<template>
	<button class="btn btn-dark" @click.stop.prevent="buscarCandidatos">
		<load>
			<span>Buscar</span>
		</load>
	</button>
</template>

<script>
import { candidatos } from '@functions/busca'
import load from '@shared/load'

export default {
	name: 'botaoBuscaCandidato',
	components: {
		load
	},
	props: {
		filtro: {
			type: Object,
			default: {}
		}
	},
	methods: {
		async buscarCandidatos() {
			this.mostraMensagem({tipo: null, msg: null})
			candidatos(this, this.filtro)
		},
		mostraMensagem(mensagem) {
			this.$emit('msg', mensagem)
		}
	}
}
</script>