<template>
	<button class="btn btn-dark" @click.stop.prevent="buscarDadosSerie" :disabled="buscando">
		<i v-if="buscando" class="spinner-border spinner-border-sm"></i>
		<span v-else>Buscar</span>
	</button>
</template>

<script>
import apiDadosSerie from '../../../../core/dados/apiDadosSerie'
import paginaArray from '../../../../core/helpers/paginaArray'

export default {
	name: 'botaoBuscaSerie',
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
	computed: {
		limite_por_pagina() {
			return this.$store.state.paginacao.limite_por_pagina
		}
	},
	methods: {
		async buscarDadosSerie() {
			this.buscando = true
			this.$emit('msgSuccess', null)
			this.$emit('msgError', null)
			await apiDadosSerie.buscaInfos(this.filtro).then(response => {
				this.buscando = false
				let series = []
				if(response.data.success) {
					series = response.data.data.dadosseries
					this.mostraMensagem({tipo: 'sucesso', msg: response.data.data.msg})
				} else {
					this.mostraMensagem({tipo: 'alerta', msg: response.data.error.message})
				}
				this.atualizaStore(series)
			}).catch(e => {
				this.mostraMensagem({tipo: 'erro', msg: e})
			})
		},
		mostraMensagem(mensagem) {
			this.$emit('msg', mensagem)
		},
		atualizaStore(dados) {
			let total_registros = dados.length
			dados = paginaArray(dados);
			this.$store.dispatch('carregaDadosSerie', {dados, total_registros})
		}
	}
}
</script>