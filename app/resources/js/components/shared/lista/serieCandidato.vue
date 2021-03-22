<template>
	<table class="table table-sm table-hover table-bordered text-center">
        <thead class="thead-dark">
            <tr>
                <th v-for="coluna in colunas" :key="coluna.dsc_coluna">
                    {{coluna.dsc_coluna}}
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(serie, i) in series" :key="i"
                :class="serie.cod_serie_v == inscricao.cod_serie_v ? 'table-primary' : ''">
                <th>{{serie.serie.serie}}</th>
                
                <th>{{serie.turno.turno}}</th>
                
                <th>{{serie.turma.turma}}</th>
                
                <th>{{serie.professor.nom_prof}}</th>
                
                <th>{{serie.qtd_alunos}}</th>
                
                <th>{{serie.limite_alunos}}</th>

				<th>
                    <input type="radio" id="seriev" :value="serie.cod_serie_v" v-model="inscricao.cod_serie_v" />
                </th>
            </tr>
        </tbody>
	</table>
</template>

<script>

export default {
	name: 'listaInscricao',
	props: {
		inscricao: {
			type: Object,
            default: {}
		}
	},
	data() {
		return {
			colunas: [
				{dsc_coluna: 'Série'},
				{dsc_coluna: 'Turno'},
				{dsc_coluna: 'Turma'},
				{dsc_coluna: 'Professor'},
				{dsc_coluna: 'Total de alunos'},
				{dsc_coluna: 'Limite de alunos'},
				{dsc_coluna: 'Selecionar'}
			]
		}
	},
	computed: {
		series() {
			return this.$store.state.candidatos.series[0]
		}
	}
}
</script>