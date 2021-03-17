<template>
	<div>
		<buscaDadosSerie :classTitulo="classTitulo" />
		<listaDadosSerie :classTitulo="classTitulo"/>
	</div>
</template>

<script>
import buscaDadosSerie from '@busca/dadosSerie'
import listaDadosSerie from '@lista/dadosSerie'

export default {
    name: 'Serie',
    components: {
        buscaDadosSerie,
		listaDadosSerie
    },
    data() {
		return {
			classTitulo: 'backgroundColor: brown;'
		}
	}
}
</script>