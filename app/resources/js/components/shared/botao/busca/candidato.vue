<template>
	<button class="btn btn-dark" @click.stop.prevent="buscarCandidatos" :disabled="processando">
		<span v-if="processando" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
		<span v-else>Buscar</span>
	</button>
</template>

<script>
import { candidatos } from '@functions/busca'

export default {
	name: 'botaoBuscaCandidato',
	props: {
		filtro: {
			type: Object,
			default: {}
		}
	},
	computed: {
		processando() {
			return this.$store.state.status.processando
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