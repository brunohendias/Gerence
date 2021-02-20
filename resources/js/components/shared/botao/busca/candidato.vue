<template>
	<button class="btn btn-dark" @click.stop.prevent="buscarCandidatos" :disabled="buscando">
		<i v-if="buscando" class="spinner-border spinner-border-sm"></i>
		<span v-else>Buscar</span>
	</button>
</template>

<script>
import apiCandidato from '../../../../core/entidade/apiCandidato'
import paginaArray from '../../../../core/helpers/paginaArray'

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
	computed: {
		limite_por_pagina() {
			return this.$store.state.paginacao.limite_por_pagina
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
					this.mostraMensagem({tipo: 'sucesso', msg: response.data.data.msg})
				} else {
					this.mostraMensagem({tipo: 'alerta', msg: response.data.error.message})
				}
				this.atualizaStore(candidatos)
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
			this.$store.dispatch('carregaCandidatos', {dados, total_registros})
		}
	}
}
</script>