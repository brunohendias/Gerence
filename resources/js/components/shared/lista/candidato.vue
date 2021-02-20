<template>
	<templatelista :colunas="colunas" titulo="candidatos" :classTitulo="classTitulo" 
		:totalRegistros="totalRegistros" @proximaPagina="current = $event">
		<tbody>
			<tr v-for="(candidato, i) in candidatos" :key="i">
				<th>{{candidato.nom_can}}</th>
				<th>{{candidato.email}}</th>
				<th>{{candidato.telefone}}</th>
				<th>{{candidato.serie.serie}}</th>
				<th>
					<botaoGeraAluno :candidato="candidato"/>
				</th>
				<th>
					<botaoDeletaCandidato :candidato="candidato" :index="i"/>
				</th>
			</tr>
		</tbody>
	</templatelista>
</template>

<script>
import templatelista from '../template/lista'
import botaoGeraAluno from '../botao/geraAluno'
import botaoDeletaCandidato from '../botao/deletaCandidato'

export default {
	name: 'listaCandidato',
	components: {
		templatelista,
		botaoGeraAluno,
		botaoDeletaCandidato
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
	},
	data() {
		return {
			colunas: [
				{dsc_coluna: 'Nome'},
				{dsc_coluna: 'Email'},
				{dsc_coluna: 'Telefone'},
				{dsc_coluna: 'Série'},
				{dsc_coluna: 'Gerar aluno'},
				{dsc_coluna: 'Excluir'}
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