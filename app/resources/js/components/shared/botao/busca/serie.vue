<template>
	<button class="btn btn-dark" @click.stop.prevent="buscarDadosSerie">
       	<load>
			<span>Buscar</span>
		</load>
	</button>
</template>

<script>
import { dadosSeries } from '@functions/busca'
import load from '@shared/load'

export default {
	name: 'botaoBuscaSerie',
	props: {
		filtro: {
			type: Object,
			default: {}
		}
	},
	components: {
		load
	},
	methods: {
		async buscarDadosSerie() {
			this.mostraMensagem({tipo: null, msg: null})
			dadosSeries(this, this.filtro)
		},
		mostraMensagem(mensagem) {
			this.$emit('msg', mensagem)
		}
	}
}
</script>