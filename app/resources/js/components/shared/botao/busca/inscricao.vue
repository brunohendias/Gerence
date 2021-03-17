<template>
	<button class="btn btn-dark" @click.stop.prevent="buscarInscricoes" :disabled="buscando">
		<i v-if="buscando" class="spinner-border spinner-border-sm"></i>
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
		buscando() {
			return this.$store.state.status.buscando
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