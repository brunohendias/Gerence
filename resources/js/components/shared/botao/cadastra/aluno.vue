<template>
	<button class="btn btn-primary" @click="geraAluno" :disabled="cadastrando">
		<i v-if="cadastrando" class="spinner-border spinner-border-sm"></i>
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
	data() {
		return {
			cadastrando: false
		}
	},
	methods: {
		geraAluno() {
			this.cadastrando = true

			this.candidato.cod_situacao = 3 
			
			aluno(this, this.candidato)
			
			this.cadastrando = false
		}
	}
}
</script>