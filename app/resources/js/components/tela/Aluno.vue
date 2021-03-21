<template>
	<div>
		<buscaAluno :classTitulo="classTitulo" />
		<listaAluno :classTitulo="classTitulo" />
	</div>
</template>

<script>
import buscaAluno from '@busca/aluno'
import listaAluno from '@lista/aluno'

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