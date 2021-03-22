<template>
	<templatelista :colunas="colunas" titulo="séries"
		:totalRegistros="totalRegistros" @proximaPagina="current = $event">
		<tbody>
			<tr v-for="(serie, i) in series" :key="i">
				<th>{{serie.serie.serie}}</th>
				<th>{{serie.turno.turno}}</th>
				<th>{{serie.turma.turma}}</th>
				<th>{{serie.professor ? serie.professor.nom_prof : ''}}</th>
				<th>{{serie.qtd_alunos}}</th>
				<th>{{serie.limite_alunos}}</th>
				<th>
					<span @click="editaserie(serie)" class="ml-2">
						<router-link class="btn btn-primary btn-tabela" to="/editaserie">
							<i class="fas fa-pencil-alt"></i>
						</router-link>
					</span>
				</th>
			</tr>
		</tbody>
	</templatelista>
</template>

<script>
import templatelista from '../template/lista'

export default {
	name: 'listaInscricao',
	components: {
		templatelista
	},
	data() {
		return {
			colunas: [
				{dsc_coluna: 'Série'},
				{dsc_coluna: 'Turno'},
				{dsc_coluna: 'Turma'},
				{dsc_coluna: 'Professor'},
				{dsc_coluna: 'Total de alunos'},
				{dsc_coluna: 'Limite de alunos'},
				{dsc_coluna: 'Editar'}
			],
			current: 0
		}
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
	methods: {
		editaserie(serie) {
			this.trocaAcao('edita')
			this.$store.dispatch('carregaSerie', serie)
		},
		trocaAcao(acao) {
            this.$store.dispatch('alteraAcao', acao)
        }
	}
}
</script>