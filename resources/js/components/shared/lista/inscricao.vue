<template>
	<templatelista :colunas="colunas" titulo="inscrições" :classTitulo="classTitulo" 
		:totalRegistros="totalRegistros" @proximaPagina="current = $event">
		<tbody>
			<tr v-for="(inscricao, i) in inscricoes" :key="i">
				<th>{{inscricao.nom_insc}}</th>
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
		inscricoesStore() {
			return this.$store.state.inscricoes
		},
		inscricoes() {
			return this.inscricoesStore.inscricoes[this.current]
		},
		totalRegistros() {
			return this.inscricoesStore.total_registros
		}
	},
	data() {
		return {
			colunas: [
				{dsc_coluna: 'Nome'},
				{dsc_coluna: 'Email'},
				{dsc_coluna: 'Telefone'},
				{dsc_coluna: 'Série'},
				{dsc_coluna: 'Enturmar'}
			],
			current: 0
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