<template>
	<div>
		<buscaInscricao />
		<listaInscricao />
	</div>
</template>

<script>
import buscaInscricao from '@busca/inscricao'
import listaInscricao from '@lista/inscricao'

export default {
	name: 'Inscricoes',
	components: {
		buscaInscricao,
		listaInscricao
	}
}
</script>