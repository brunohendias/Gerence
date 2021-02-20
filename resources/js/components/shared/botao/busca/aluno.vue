<template>
	<button class="btn btn-dark" @click.stop.prevent="buscarAlunos" :disabled="buscando">
		<i v-if="buscando" class="spinner-border spinner-border-sm"></i>
		<span v-else>Buscar</span>
	</button>
</template>

<script>
import apiAluno from '../../../../core/entidade/apiAluno'
import paginaArray from '../../../../core/helpers/paginaArray'

export default {
	name: 'botaoBuscaAluno',
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
		async buscarAlunos() {
			this.buscando = true
			this.$emit('msgSuccess', null)
			this.$emit('msgError', null)
			await apiAluno.listarAlunos(this.filtro).then(response => {
				this.buscando = false
				let alunos = []
				if(response.data.success) {
					alunos = response.data.data.alunos
					this.mostraMensagem({tipo: 'sucesso', msg: response.data.data.msg})
				} else {
					this.mostraMensagem({tipo: 'alerta', msg: response.data.error.message})
				}
				this.atualizaStore(alunos)
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
			this.$store.dispatch('carregaAlunos', {dados, total_registros})
		}
	}
}
</script>