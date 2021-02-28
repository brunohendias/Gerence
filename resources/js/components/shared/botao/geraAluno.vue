<template>
	<button class="btn btn-primary" @click="geraAluno" :disabled="cadastrando">
		<i v-if="cadastrando" class="spinner-border spinner-border-sm"></i>
		<i v-else class="fas fa-edit"></i>
	</button>
</template>

<script>
import apiAluno from '@api/entidade/apiAluno'

export default {
	name: 'botaoGeraAluno',
	props: {
		candidato: {
			type: Object
		}
	},
	data() {
		return {
			cadastrando: false
		}
	},
	computed: {
		novoAluno() {
			return this.$store.state.candidatos.candidato 
		}
	},
	methods: {
		geraAluno() {
			this.cadastrando = true
			let filtro = this.candidato ? this.candidato : this.novoAluno 
			filtro.cod_situacao = filtro.cod_situacao ? filtro.cod_situacao : 3 
			apiAluno.gerarAluno(filtro).then(response => {
				this.cadastrando = false
				let title = ''
				let icon = ''
				if (response.data.success) {
					title = response.data.data.msg
					icon = 'success'
				} else {
					title = response.data.error.message
					icon = 'error'
				}
				swal({ title, icon })
			})
		}
	}
}
</script>