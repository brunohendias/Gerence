<template>
	<div>
		<buscaCandidato :classTitulo="classTitulo"/>
		<listaCandidato :classTitulo="classTitulo"/>
	</div>
</template>

<script>
import buscaCandidato from '../shared/busca/candidato'
import listaCandidato from '../shared/lista/candidato'

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