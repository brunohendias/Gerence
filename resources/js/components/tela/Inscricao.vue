<template>
	<div>
		<buscaInscricao :classTitulo="classTitulo"/>
		<listaInscricao :classTitulo="classTitulo"/>
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
	},
	data() {
		return {
			classTitulo: 'backgroundColor: midnightblue;'
		}
	}
}
</script>