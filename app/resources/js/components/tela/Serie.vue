<template>
	<div>
		<buscaDadosSerie />
		<listaDadosSerie />
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
    }
}
</script>