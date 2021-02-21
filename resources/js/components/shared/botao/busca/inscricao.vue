<template>
	<button class="btn btn-dark" @click.stop.prevent="buscarInscricoes" :disabled="buscando">
		<i v-if="buscando" class="spinner-border spinner-border-sm"></i>
		<span v-else>Buscar</span>
	</button>
</template>

<script>
import busca from '../../../../core/functions/busca'

export default {
	name: 'botaoBuscaInscricao',
	props: {
		filtro: {
			type: Object,
			default: {}
		}
	},
	data() {
		return {
			buscando: false
		}
	},
	methods: {
		async buscarInscricoes() {
			this.buscando = true
			this.$emit('msgSuccess', null)
			this.$emit('msgError', null)
			busca.inscricoes(this, this.filtro)
			this.buscando = false
		},
		mostraMensagem(mensagem) {
			this.$emit('msg', mensagem)
		}
	}
}
</script>