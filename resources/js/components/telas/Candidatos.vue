<template>
	<div>
		<buscaCandidato :classTitulo="classTitulo"/>
		<listaCandidato :classTitulo="classTitulo"/>
	</div>
</template>

<script>
import buscaCandidato from '../shared/busca/buscaCandidato'
import listaCandidato from '../shared/lista/listaCandidato'

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