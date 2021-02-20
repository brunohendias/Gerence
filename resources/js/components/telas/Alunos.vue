<template>
	<div>
		<buscaAluno :classTitulo="classTitulo" />
		<listaAluno :classTitulo="classTitulo" />
	</div>
</template>

<script>
import buscaAluno from '../shared/busca/aluno'
import listaAluno from '../shared/lista/aluno'

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