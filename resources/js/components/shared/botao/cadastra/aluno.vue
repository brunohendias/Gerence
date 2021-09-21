<template>
	<button class="btn btn-primary btn-tabela" @click="geraAluno">
		<load>
			<i class="fas fa-edit"></i>
		</load>
	</button>
</template>

<script>
import { aluno } from '@functions/cadastra'
import load from '@shared/load'

export default {
	name: 'botaoGeraAluno',
	props: {
		candidato: {
			type: Object,
			required: true
		}
	},
	components: {
		load
	},
	methods: {
		geraAluno() {
			this.candidato.cod_situacao = 3 
			
			aluno(this, this.candidato)
		}
	}
}
</script>