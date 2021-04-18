<template>
	<div class="bg-white borda-top">
		<div v-if="totalRegistros > 0">
			<table class="table table-sm table-striped table-bordered text-center">
				<thead>
					<tr>
						<th v-for="coluna in colunas" :key="coluna.dsc_coluna">{{coluna.dsc_coluna}}</th>
					</tr>
				</thead>
				<slot></slot>
			</table>
			<div class="container row">
				<div class="ml-auto">
					<paginacao :totalPaginas="totalPaginas" @alteraPagina="proximaPagina($event)"/>
				</div>
			</div>
		</div>
		<div v-else>
			<span class="p-1">
				<h5 class="ml-4">Busque para mostrar os registros</h5>
			</span>
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
		totalRegistros: {
			type: Number,
			required: true
		}
	},
	computed: {
		totalPaginas() {
			return Math.ceil(this.totalRegistros / 15)
		}
	},
	methods: {
		proximaPagina(pagina) {
			this.$emit('proximaPagina', pagina)
		}
	}
}
</script>