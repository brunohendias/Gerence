<template>
	<templatelista :colunas="colunas" titulo="inscrições" :classTitulo="classTitulo" 
		:totalRegistros="totalRegistros" @proximaPagina="current = $event">
		<tbody>
			<tr v-for="(inscricao, i) in inscricoes" :key="i">
				<th>{{inscricao.nom_insc}}</th>
				<th>{{inscricao.email}}</th>
				<th>{{inscricao.telefone}}</th>
				<th>{{inscricao.serie.serie}}</th>
				<th>{{inscricao.turno.turno}}</th>
				<th>
					<span @click="editainscricao(inscricao)">
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
import templatelista from '../template/lista'
import { dadosSeries } from '@functions/busca'

export default {
	name: 'listaInscricao',
	components: {
		templatelista
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
				{dsc_coluna: 'Email'},
				{dsc_coluna: 'Telefone'},
				{dsc_coluna: 'Série'},
				{dsc_coluna: 'Turno'},
				{dsc_coluna: 'Enturmar'}
			],
			current: 0,
			lista: true,
			acao: 'carregaSeriesCandidato'
		}
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
	methods: {
		editainscricao(inscricao) {
			this.$store.dispatch('selecionaInscricao', inscricao)
			dadosSeries(this, { cod_serie: inscricao.cod_serie })
		}
	}
}
</script>