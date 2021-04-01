<template>
	<button class="btn btn-dark" @click.stop.prevent="buscarInscricoes">
		<load>
			<span>Buscar</span>
		</load>
	</button>
</template>

<script>
import { inscricoes } from '@functions/busca'
import load from '@shared/load'

export default {
	name: 'botaoBuscaInscricao',
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
		async buscarInscricoes() {
			this.mostraMensagem({tipo: null, msg: null})
			inscricoes(this, this.filtro)
		},
		mostraMensagem(mensagem) {
			this.$emit('msg', mensagem)
		}
	}
}
</script>