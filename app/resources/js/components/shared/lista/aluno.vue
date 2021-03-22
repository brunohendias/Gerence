<template>
	<templatelista :colunas="colunas" titulo="alunos" :totalRegistros="totalRegistros"
		 @proximaPagina="current = $event">
		<tbody>
			<tr v-for="(aluno, i) in alunos" :key="i">
				<th>{{aluno.nom_aluno}}</th>
				<th>{{aluno.serie}}</th>
				<th>{{aluno.turno}}</th>
				<th>{{aluno.turma}}</th>
				<th>{{aluno.nom_prof}}</th>
				<th>{{aluno.atencao.atencao}}</th>
				<th>{{aluno.situacao.situacao}}</th>
			</tr>
		</tbody>
	</templatelista>
</template>

<script>
import templatelista from '../template/lista'

export default {
	name: 'listaAluno',
	components: {
		templatelista
	},
	data() {
		return {
			colunas: [
				{dsc_coluna: 'Nome'},
				{dsc_coluna: 'Série'},
				{dsc_coluna: 'Turno'},
				{dsc_coluna: 'Turma'},
				{dsc_coluna: 'Professor'},
				{dsc_coluna: 'Atenção'},
				{dsc_coluna: 'Situação'}
			],
			current: 0
		}
	},
	computed: {
		alunosStore() {
			return this.$store.state.alunos
		},
		alunos() {
			return this.alunosStore.alunos[this.current]
		},
		totalRegistros() {
			return this.alunosStore.total_registros
		}
	}
}
</script>