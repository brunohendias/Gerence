<template>
	<div class="bg-white borda-top">
		<div :class="'headerpanel-'+pathname">
			<div class="row ml-4 pt-2 text-white">
				<h5>Lista de {{titulo}}</h5>
			</div>
		</div>
		<div v-if="totalRegistros > 0" class="p-4">
			<table class="table table-sm table-striped table-bordered text-center">
				<thead class="thead-dark">
					<tr class="text-center">
						<th v-for="coluna in colunas" :key="coluna.dsc_coluna">{{coluna.dsc_coluna}}</th>
					</tr>
				</thead>
				<slot></slot>
			</table>
			<div class="row">
				<div class="ml-3" v-if="totalRegistros > 0">
					<h5 class="mr-4 pt-1">total de registros: {{totalRegistros}}</h5>
				</div>
				<paginacao :totalPaginas="totalPaginas" @alteraPagina="proximaPagina($event)" class="ml-auto mr-4"/>
			</div>
		</div>
		<div v-else>
			<span class="p-1"><h5 class="ml-4">Busque para mostrar os registros</h5></span>
		</div>
	</div>
</template>

<script>
import paginacao from '../paginacao'

export default {
	name: 'templatelista',
	components: {
		paginacao
	},
	props: {
		colunas: {
			type: Array,
			required: true
		},
		titulo: {
			type: String,
			required: true
		},
		totalRegistros: {
			type: Number,
			required: true
		}
	},
	computed: {
		totalPaginas() {
			return Math.ceil(this.totalRegistros / 15)
		},
		pathname() {
			return window.location.pathname.split('/').reverse()[0]
		}
	},
	methods: {
		proximaPagina(pagina) {
			this.$emit('proximaPagina', pagina)
		}
	}
}
</script>