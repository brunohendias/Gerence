<template>
	<templatelista :colunas="colunas" titulo="séries" :classTitulo="classTitulo" 
		:totalRegistros="totalRegistros" @proximaPagina="current = $event">
		<tbody>
			<tr v-for="(serie, i) in series" :key="i">
				<th>{{serie.serie.serie}}</th>
				<th>{{serie.turno.turno}}</th>
				<th>{{serie.turma.turma}}</th>
			</tr>
		</tbody>
	</templatelista>
</template>

<script>
import templatelista from './templatelista'

export default {
	name: 'listaInscricao',
	components: {
		templatelista
	},
	computed: {
        seriesStore() {
            return this.$store.state.dados.serie
        },
		series() {
			return this.seriesStore.dadosSerie[this.current]
		},
		totalRegistros() {
			return this.seriesStore.total_registros
		}
	},
	data() {
		return {
			colunas: [
				{dsc_coluna: 'Serie'},
				{dsc_coluna: 'Turno'},
				{dsc_coluna: 'Turma'}
			],
			current: 0
		}
	},
	props: {
		classTitulo: {
			type: String
		}
	}
}
</script>