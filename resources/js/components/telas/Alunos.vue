<template>
	<div>
		<buscaAluno :classTitulo="classTitulo" />
		<listaAluno :classTitulo="classTitulo" />
	</div>
</template>

<script>
import buscaAluno from '../shared/busca/buscaAluno'
import listaAluno from '../shared/lista/listaAluno'

export default {
	name: 'Alunos',
	components: {
		buscaAluno,
		listaAluno
	},
	data() {
		return {
			classTitulo: 'backgroundColor: brown;'
		}
	}
}
</script>