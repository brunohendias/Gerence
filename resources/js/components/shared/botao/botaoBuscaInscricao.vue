<template>
	<button class="btn btn-dark" @click.stop.prevent="buscarInscricoes" :disabled="buscando">
		<i v-if="buscando" class="spinner-border spinner-border-sm"></i>
		<span v-else>Buscar</span>
	</button>
</template>

<script>
import apiInscricao from '../../../core/entidade/apiInscricao'

export default {
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
			await apiInscricao.listarInscricoes(this.filtro).then(response => {
				this.buscando = false
				let inscricoes = []
				if(response.data.success) {
					inscricoes = response.data.data.inscricoes
					this.$emit('msgSuccess', response.data.data.msg)
				} else {
					this.$emit('msgError', response.data.error.message)
				}
				this.$store.dispatch('carregaInscricoes', inscricoes)
			})
		}
	}
}
</script>