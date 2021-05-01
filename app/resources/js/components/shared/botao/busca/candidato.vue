<template>
	<BotaoBusca :filtro="filtro" pathname="candidato" action="carregaCandidatos"/>
</template>

<script>
import BotaoBusca from '@template/botaoBuscaLista'

export default {
	name: 'botaoBuscaCandidato',
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