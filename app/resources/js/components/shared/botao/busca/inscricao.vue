<template>
	<BotaoBusca :filtro="filtro" pathname="inscricao" action="carregaInscricoes"/>
</template>

<script>
import BotaoBusca from '@template/botaoBuscaLista'

export default {
	name: 'botaoBuscaInscricao',
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