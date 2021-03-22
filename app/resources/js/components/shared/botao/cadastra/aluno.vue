<template>
	<button class="btn btn-primary btn-tabela" @click="geraAluno" :disabled="processando">
		<span v-if="processando" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
		<i v-else class="fas fa-edit"></i>
	</button>
</template>

<script>
import { aluno } from '@functions/cadastra'

export default {
	name: 'botaoGeraAluno',
	props: {
		candidato: {
			type: Object,
			required: true
		}
	},
	computed: {
		processando() {
			return this.$store.state.status.processando
		}
	},
	methods: {
		geraAluno() {
			this.candidato.cod_situacao = 3 
			
			aluno(this, this.candidato)
		}
	}
}
</script>