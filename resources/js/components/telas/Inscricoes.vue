<template>
	<div>
		<buscaInscricao :classTitulo="classTitulo"/>
		<listaInscricao :classTitulo="classTitulo"/>
	</div>
</template>

<script>
import buscaInscricao from '../shared/busca/buscaInscricao'
import listaInscricao from '../shared/lista/listaInscricao'

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