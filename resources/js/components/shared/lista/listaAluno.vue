<template>
	<templatelista :colunas="colunas" :action="action" 
		titulo="alunos" :totalPorPagina="alunos.length" 
		:totalPaginas="totalPaginas" :totalRegistros="totalRegistros"
		:classTitulo="classTitulo"
	>
		<tbody>
			<tr v-for="(aluno, i) in alunos" :key="i">
				<th>{{aluno.nomaluno}}</th>
				<th>{{aluno.serie.serie}}</th>
				<th>{{aluno.turma.turma}}</th>
				<th>{{aluno.turno.turno}}</th>
				<th>{{aluno.atencao.atencao}}</th>
				<th>{{aluno.professor.nomprof}}</th>
				<th>{{aluno.situacao.situacao}}</th>
			</tr>
		</tbody>
	</templatelista>
</template>

<script>
import templatelista from './templatelista'

export default {
	name: 'listaAluno',
	components: {
		templatelista
	},
	computed: {
		pagina_atual() {
			return this.$store.state.alunos.pagina_atual
		},
		alunos() {
			let pagina = this.pagina_atual ? this.pagina_atual : 1
			return this.$store.state.alunos.alunos[pagina - 1]
		},
		totalPaginas() {
			return this.$store.state.alunos.alunos.length
		},
		totalRegistros() {
			return this.$store.state.alunos.total_registros
		}
	},
	data() {
		return {
			colunas: [
				{dsc_coluna: 'Nome'},
				{dsc_coluna: 'Serie'},
				{dsc_coluna: 'Turma'},
				{dsc_coluna: 'Turno'},
				{dsc_coluna: 'Atenção'},
				{dsc_coluna: 'Professor'},
				{dsc_coluna: 'Situação'}
			],
			action: 'alteraPaginaAluno'
		}
	},
	props: {
		classTitulo: {
			type: String
		}
	}
}
</script>