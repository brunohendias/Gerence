<template>
	<button class="btn btn-success ml-3" @click.prevent="atualizar" :disabled="validarCandidato || processando">
        <span v-if="processando" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
		<span v-else>Gerar candidato</span>
	</button>
</template>

<script>
import { candidato } from '@functions/cadastra'

export default {
    data() {
        return {
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
        },
        processando() {
			return this.$store.state.status.processando
		}
	},
    methods: {
        atualizar() {
            candidato(this, this.inscricao)
        }
    }
}
</script>