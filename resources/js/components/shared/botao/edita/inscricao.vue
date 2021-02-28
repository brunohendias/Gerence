<template>
	<button class="btn btn-success ml-3" @click.prevent="atualizar" :disabled="validarCandidato || editando">
        <i v-if="editando" class="spinner-border spinner-border-sm"></i>
		<span v-else>Gerar candidato</span>
	</button>
</template>

<script>
import cadastra from '@functions/cadastra'

export default {
    props: {
        seriev: {
            type: Number,
            required: true
        }
    },
    data() {
        return {
            editando: false
        }
    },
	computed: {
		inscricao() {
            return this.$store.state.inscricoes.inscricao
        },
        validarCandidato() {
            return !(this.inscricao.nom_insc && this.inscricao.email && this.inscricao.telefone && this.inscricao.cpf && 
                this.inscricao.cod_atencao && this.inscricao.cod_turno && this.inscricao.cod_turma && this.inscricao.cod_prof)
        }
	},
    methods: {
        atualizar() {
            this.editando = true
            this.inscricao.cod_serie_v = this.seriev
            cadastra.candidato(this, this.inscricao)
            this.editando = false
        }
    }
}
</script>