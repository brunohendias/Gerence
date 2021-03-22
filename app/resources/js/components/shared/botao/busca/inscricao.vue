<template>
	<button class="btn btn-dark" @click.stop.prevent="buscarInscricoes" :disabled="processando">
		<span v-if="processando" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
		<span v-else>Buscar</span>
	</button>
</template>

<script>
import { inscricoes } from '@functions/busca'

export default {
	name: 'botaoBuscaInscricao',
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
		async buscarInscricoes() {
			this.mostraMensagem({tipo: null, msg: null})
			inscricoes(this, this.filtro)
		},
		mostraMensagem(mensagem) {
			this.$emit('msg', mensagem)
		}
	}
}
</script>