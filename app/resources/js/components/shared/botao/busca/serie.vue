<template>
	<BotaoBusca :filtro="filtro" pathname="serievinculo" action="carregaDadosSerie"/>
</template>

<script>
import BotaoBusca from '@template/botaoBuscaLista'

export default {
	name: 'botaoBuscaDadosSerie',
	components: {
		BotaoBusca
	},
	props: {
		filtro: {
			type: Object,
			default: {}
		}
	}
}
</script>