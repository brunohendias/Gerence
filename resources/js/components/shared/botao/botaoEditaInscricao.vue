<template>
	<button class="btn btn-success ml-3" @click.prevent="atualizar" :disabled="validarCandidato">
		Gerar candidato
	</button>
</template>

<script>
import apiCandidato from '../../../core/entidade/apiCandidato'

export default {
	computed: {
		candidato() {
            return this.$store.state.inscricoes.inscricao
        },
        validarCandidato() {
            if(this.candidato.nominsc && this.candidato.email && this.candidato.telefone && this.candidato.cpf && this.candidato.codserie && this.candidato.codturno && this.candidato.codatencao && this.candidato.codturma && this.candidato.codprof){
                return false
            }
            return true
        }
	},
	methods: {
		async atualizar() {
            await apiCandidato.cadastrar(this.candidato).then(response => {
                let icon = 'success'
                let title = ''
                if(response.data.success) {
                     title = response.data.data.msg
                } else {
                	title = response.data.error.message
                    icon = 'error'
                }
                swal({
                    title,
                    icon
                })
            }).catch(err => {
            	swal({
                    title: "Erro ao atualizar essa inscrição",
                    icon: 'error'
                })
            })
            this.$store.dispatch('atualizaCandidato', this.candidato)
        }
	}
}
</script>