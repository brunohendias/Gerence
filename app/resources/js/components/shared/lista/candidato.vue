<template>
	<templatelista :colunas="colunas" titulo="candidatos" :classTitulo="classTitulo" 
		:totalRegistros="totalRegistros" @proximaPagina="current = $event">
		<tbody>
			<tr v-for="(candidato, i) in candidatos" :key="i">
				<th>{{candidato.nom_can}}</th>
				<th>{{candidato.telefone}}</th>
				<th>{{candidato.serie}}</th>
				<th>{{candidato.turno}}</th>
				<th>{{candidato.turma}}</th>
				<th>{{candidato.nom_prof}}</th>
				<th>
					<botaoGeraAluno :candidato="candidato" class="btn-tabela"/>
				</th>
				<th>
					<botaoDeletaCandidato :candidato="candidato" :index="i" :pagina="current" class="btn-tabela"/>
				</th>
			</tr>
		</tbody>
	</templatelista>
</template>

<script>
import templatelista from '../template/lista'
import botaoGeraAluno from '@botao/cadastra/aluno'
import botaoDeletaCandidato from '@botao/deleta/candidato'

export default {
	name: 'listaCandidato',
	components: {
		templatelista,
		botaoGeraAluno,
		botaoDeletaCandidato
	},
	props: {
		classTitulo: {
			type: String
		}
	},
	data() {
		return {
			colunas: [
				{dsc_coluna: 'Nome'},
				{dsc_coluna: 'Telefone'},
				{dsc_coluna: 'Série'},
				{dsc_coluna: 'Turno'},
				{dsc_coluna: 'Turma'},
				{dsc_coluna: 'Professor'},
				{dsc_coluna: 'Aluno'},
				{dsc_coluna: 'Excluir'}
			],
			current: 0
		}
	},
	computed: {
		candidatosStore() {
			return this.$store.state.candidatos
		},
		candidatos() {
			return this.candidatosStore.candidatos[this.current]
		},
		totalRegistros() {
			return this.candidatosStore.total_registros
		}
	}
}
</script>