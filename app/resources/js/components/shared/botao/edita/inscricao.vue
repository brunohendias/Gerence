<template>
	<button class="btn btn-success ml-3" @click.prevent="atualizar" :disabled="validarCandidato || editando">
        <i v-if="editando" class="spinner-border spinner-border-sm"></i>
		<span v-else>Gerar candidato</span>
	</button>
</template>

<script>
import { candidato } from '@functions/cadastra'

export default {
    data() {
        return {
            editando: false,
            lista: true
        }
    },
	computed: {
		inscricao() {
            return this.$store.state.inscricoes.inscricao
        },
        validarCandidato() {
            return !(this.inscricao.nom_insc && this.inscricao.email && this.inscricao.telefone && 
                this.inscricao.cpf && this.inscricao.cod_atencao && this.inscricao.cod_serie_v)
        }
	},
    methods: {
        atualizar() {
            this.editando = true
            candidato(this, this.inscricao)
            this.editando = false
        }
    }
}
</script>