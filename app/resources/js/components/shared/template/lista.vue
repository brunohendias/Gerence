<template>
	<div class="bg-white borda-top">
		<div :style="classTitulo">
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
				<paginacao :total="total" @alteraPagina="proximaPagina($event)"/>
				<div class="ml-auto" v-if="totalRegistros > 0">
					<h5 class="mr-4 pt-1">Encontramos {{totalRegistros}} registros</h5>
				</div>
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
		classTitulo: {
			Type: String,
			default: 'backgroundColor: black;'
		},
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
		total() {
			return Math.ceil(this.totalRegistros / 10)
		}
	},
	methods: {
		proximaPagina(pagina) {
			this.$emit('proximaPagina', pagina)
		}
	}
}
</script>

<style scoped>
	.btn-tabela {
		width: 30px;
		height: 30px;
	}
	.svg-inline--fa {
		font-size: 15px;
	}
	.btn {
		padding: 2px;
	}
</style>