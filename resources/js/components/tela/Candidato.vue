<template>
	<div>
		<buscaCandidato />
		<listaCandidato />
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
	}
}
</script>