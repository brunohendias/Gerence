<template>
	<div>
		<buscaInscricao :classTitulo="classTitulo"/>
		<listaInscricao :classTitulo="classTitulo"/>
	</div>
</template>

<script>
import buscaInscricao from '../shared/busca/inscricao'
import listaInscricao from '../shared/lista/inscricao'

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