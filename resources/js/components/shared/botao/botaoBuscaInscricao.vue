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
			await apiInscricao.listarInscricoes(this.filtro).then(response => {
				this.buscando = false
				let inscricoes = []
				if(response.data.success) {
					inscricoes = response.data.data.inscricoes
					this.mostraMensagem({tipo: 'sucesso', msg: response.data.data.msg})
				} else {
					this.mostraMensagem({tipo: 'alerta', msg: response.data.error.message})
				}
				this.$store.dispatch('carregaInscricoes', inscricoes)
			}).catch(e => {
				this.mostraMensagem({tipo: 'erro', msg: e})
			})
		},
		mostraMensagem(mensagem) {
			this.$emit('msg', mensagem)
		}
	}
}
</script>