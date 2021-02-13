<template>
	<button class="btn btn-dark" @click.stop.prevent="buscarCandidatos" :disabled="buscando">
		<i v-if="buscando" class="spinner-border spinner-border-sm"></i>
		<span v-else>Buscar</span>
	</button>
</template>

<script>
import apiCandidato from '../../../core/entidade/apiCandidato'

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
		async buscarCandidatos() {
			this.buscando = true
			this.$emit('msgSuccess', null)
			this.$emit('msgError', null)
			await apiCandidato.listarCandidatos(this.filtro).then(response => {
				this.buscando = false
				let candidatos = []
				if(response.data.success) {
					candidatos = response.data.data.candidatos
					this.$emit('msgSuccess', response.data.data.msg)
				} else {
					this.$emit('msgError', response.data.error.message)
				}
				this.$store.dispatch('carregaCandidatos', candidatos)
			})
		}
	}
}
</script>