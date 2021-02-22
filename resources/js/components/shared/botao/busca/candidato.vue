<template>
	<button class="btn btn-dark" @click.stop.prevent="buscarCandidatos" :disabled="buscando">
		<i v-if="buscando" class="spinner-border spinner-border-sm"></i>
		<span v-else>Buscar</span>
	</button>
</template>

<script>
import busca from '@functions/busca'

export default {
	name: 'botaoBuscaCandidato',
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
		async buscarCandidatos() {
			this.buscando = true
			this.$emit('msgSuccess', null)
			this.$emit('msgError', null)
			busca.candidatos(this, this.filtro)
			this.buscando = false
		},
		mostraMensagem(mensagem) {
			this.$emit('msg', mensagem)
		}
	}
}
</script>