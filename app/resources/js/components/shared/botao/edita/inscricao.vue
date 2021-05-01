<template>
	<button class="btn btn-success ml-3" @click.prevent="atualizar" :disabled="validarCandidato">
		<load>
			<span>Gerar candidato</span>
		</load>
	</button>
</template>

<script>
import { candidato } from '@functions/cadastra'
import load from '@template/load'

export default {
    components: {
        load
    },
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
        }
	},
    methods: {
        atualizar() {
            candidato(this, this.inscricao)
        }
    }
}
</script>