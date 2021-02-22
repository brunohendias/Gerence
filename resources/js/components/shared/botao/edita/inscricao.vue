<template>
	<button class="btn btn-success ml-3" @click.prevent="atualizar" :disabled="validarCandidato">
		Gerar candidato
	</button>
</template>

<script>
import cadastra from '@functions/cadastra'

export default {
	computed: {
		candidato() {
            return this.$store.state.inscricoes.inscricao
        },
        validarCandidato() {
            return !(this.candidato.nom_insc && this.candidato.email && this.candidato.telefone && 
                this.candidato.cpf && this.candidato.cod_serie && this.candidato.cod_turno && 
                this.candidato.cod_atencao && this.candidato.cod_turma && this.candidato.cod_prof)
        }
	},
    methods: {
        atualizar() {
            cadastra.candidato(this, this.candidato)
        }
    }
}
</script>