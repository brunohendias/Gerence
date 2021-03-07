<template>
	<button class="btn btn-dark" @click.stop.prevent="buscarDadosSerie" :disabled="buscando">
		<i v-if="buscando" class="spinner-border spinner-border-sm"></i>
		<span v-else>Buscar</span>
	</button>
</template>

<script>
import { dadosSeries } from '@functions/busca'

export default {
	name: 'botaoBuscaSerie',
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
		async buscarDadosSerie() {
			this.mostraMensagem({tipo: null, msg: null})
			dadosSeries(this, this.filtro)
		},
		mostraMensagem(mensagem) {
			this.$emit('msg', mensagem)
		}
	}
}
</script>