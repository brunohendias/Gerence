<template>
	<button class="btn btn-dark" @click.stop.prevent="buscarDadosSerie" :disabled="processando">
        <span v-if="processando" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
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
		processando() {
			return this.$store.state.status.processando
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