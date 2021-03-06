<template>
	<button class="btn btn-dark" @click.stop.prevent="buscarAlunos" :disabled="buscando">
		<i v-if="buscando" class="spinner-border spinner-border-sm"></i>
		<span v-else>Buscar</span>
	</button>
</template>

<script>
import busca from '@functions/busca'

export default {
	name: 'botaoBuscaAluno',
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
		buscarAlunos() {
			this.mostraMensagem({tipo: null, msg: null})
			busca.alunos(this, this.filtro)
		},
		mostraMensagem(mensagem) {
			this.$emit('msg', mensagem)
		}
	}
}
</script>