<template>
	<templatelista :colunas="colunas" :action="action" 
		titulo="inscrições" :totalPorPagina="inscricoes.length" 
		:totalPaginas="totalPaginas" :totalRegistros="totalRegistros"
		:classTitulo="classTitulo"
	>
		<tbody>
			<tr v-for="(inscricao, i) in inscricoes" :key="i">
				<th>{{inscricao.nominsc}}</th>
				<th>{{inscricao.email}}</th>
				<th>{{inscricao.telefone}}</th>
				<th>{{inscricao.serie.serie}}</th>
				<th>
					<span @click="editainscricao(inscricao)" class="ml-2">
						<router-link class="btn btn-primary" to="/editainscricao">
							<i class="fas fa-pencil-alt"></i>
						</router-link>
					</span>
				</th>
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
		pagina_atual() {
			return this.$store.state.inscricoes.pagina_atual
		},
		inscricoes() {
			let pagina = this.pagina_atual ? this.pagina_atual : 1
			return this.$store.state.inscricoes.inscricoes[pagina - 1]
		},
		totalPaginas() {
			return this.$store.state.inscricoes.inscricoes.length
		},
		totalRegistros() {
			return this.$store.state.inscricoes.total_registros
		}
	},
	data() {
		return {
			colunas: [
				{dsc_coluna: 'Nome'},
				{dsc_coluna: 'Email'},
				{dsc_coluna: 'Telefone'},
				{dsc_coluna: 'Serie'},
				{dsc_coluna: 'Enturmar'}
			],
			action: 'alteraPaginaInscricao'
		}
	},
	methods: {
		editainscricao(inscricao) {
			this.$store.dispatch('selecionaInscricao', {})
			this.$store.dispatch('selecionaInscricao', inscricao)
		}
	},
	props: {
		classTitulo: {
			type: String
		}
	}
}
</script>