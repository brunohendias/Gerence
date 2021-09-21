<template>
	<button class="btn btn-dark" @click.stop.prevent="buscarAlunos">
		<load>
			<span>Buscar</span>
		</load>
	</button>
</template>

<script>
import { alunos } from '@functions/busca'
import load from '@shared/load'

export default {
	name: 'botaoBuscaAluno',
	components: {
		load
	},
	props: {
		filtro: {
			type: Object,
			default: {}
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