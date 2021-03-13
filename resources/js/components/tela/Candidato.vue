<template>
	<div>
		<buscaCandidato :classTitulo="classTitulo"/>
		<listaCandidato :classTitulo="classTitulo"/>
	</div>
</template>

<script>
import buscaCandidato from '@busca/candidato'
import listaCandidato from '@lista/candidato'

export default {
	name: 'Candidatos',
	components: {
		buscaCandidato,
		listaCandidato
	},
	data() {
		return {
			classTitulo: 'backgroundColor: darkgreen;'
		}
	}
}
</script>