<template>
    <button class="btn btn-success" @click.prevent="atualizar" :disabled="processando || validaCampoObrigatorio">
        <span v-if="processando" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
		<span v-else>Atualizar dados</span>
    </button>
</template>

<script>
import { dadosSerie } from '@functions/edita'

export default {
    name: 'botaoEditaSerie',
    computed: {
        body() {
            return this.$store.state.dados.serie.serie
        },
        validaCampoObrigatorio() {
            return !(this.body.cod_serie && this.body.cod_turno && 
                this.body.cod_turma && this.body.limite_alunos)
        },
        processando() {
			return this.$store.state.status.processando
		}
    },
    methods: {
        atualizar() {
            dadosSerie(this, this.body)
        }
    }
}
</script>