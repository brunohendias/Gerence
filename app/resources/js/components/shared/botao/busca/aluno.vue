<template>
	<button class="btn btn-dark" @click.stop.prevent="buscarAlunos" :disabled="processando">
		<span v-if="processando" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
		<span v-else>Buscar</span>
	</button>
</template>

<script>
import { alunos } from '@functions/busca'

export default {
	name: 'botaoBuscaAluno',
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
		buscarAlunos() {
			this.mostraMensagem({tipo: null, msg: null})
			alunos(this, this.filtro)
		},
		mostraMensagem(mensagem) {
			this.$emit('msg', mensagem)
		}
	}
}
</script>