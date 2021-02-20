<template>
	<button class="btn btn-primary" @click="geraAluno">
		<i class="fas fa-edit"></i>
	</button>
</template>

<script>
import apiAluno from '../../../core/entidade/apiAluno'

export default {
	name: 'botaoGeraAluno',
	props: {
		candidato: {
			type: Object
		}
	},
	computed: {
		novoAluno() {
			return this.$store.state.candidatos.candidato 
		}
	},
	methods: {
		geraAluno() {
			let filtro = this.candidato ? this.candidato : this.novoAluno 
			filtro.cod_situacao = filtro.cod_situacao ? filtro.cod_situacao : 3 
			apiAluno.gerarAluno(filtro).then(response => {
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