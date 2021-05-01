<template>
	<BotaoBusca :filtro="filtro" pathname="aluno" action="carregaAlunos"/>
</template>

<script>
import BotaoBusca from '@template/botaoBuscaLista'

export default {
	name: 'botaoBuscaAluno',
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