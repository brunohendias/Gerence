<template>
	<div>
		<buscaAluno />
		<listaAluno />
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
	}
}
</script>