<template>
	<templatelista :colunas="colunas" :action="action" 
		titulo="candidatos" :totalPorPagina="candidatos.length" 
		:totalPaginas="totalPaginas" :totalRegistros="totalRegistros"
		:classTitulo="classTitulo"
	>
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
import templatelista from './templatelista'
import botaoGeraAluno from '../botao/botaoGeraAluno'
import botaoDeletaCandidato from '../botao/botaoDeletaCandidato'

export default {
	name: 'listaCandidato',
	components: {
		templatelista,
		botaoGeraAluno,
		botaoDeletaCandidato
	},
	computed: {
		pagina_atual() {
			return this.$store.state.candidatos.pagina_atual
		},
		candidatos() {
			let pagina = this.pagina_atual ? this.pagina_atual : 1
			return this.$store.state.candidatos.candidatos[pagina - 1]
		},
		totalPaginas() {
			return this.$store.state.candidatos.candidatos.length
		},
		totalRegistros() {
			return this.$store.state.candidatos.total_registros
		}
	},
	data() {
		return {
			colunas: [
				{dsc_coluna: 'Nome'},
				{dsc_coluna: 'Email'},
				{dsc_coluna: 'Telefone'},
				{dsc_coluna: 'Serie'},
				{dsc_coluna: 'Gerar aluno'},
				{dsc_coluna: 'Excluir'}
			],
			action: 'alteraPaginaCandidato'
		}
	},
	props: {
		classTitulo: {
			type: String
		}
	}
}
</script>