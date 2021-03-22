<template>
    <button class="btn btn-success" @click.prevent="preCadastro" :disabled="processando || validaCampoObrigatorio">
        <span v-if="processando" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        <span v-else>Cadastrar</span>
    </button>
</template>

<script>
import { dadosSerie } from '@functions/cadastra'

export default {
    name: 'botaoCadastraSerie',
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
        preCadastro() {
            /*cadastra.serie(this, this.body.serie.serie)
            cadastra.turno(this, this.body.turno.turno)
            cadastra.turma(this, this.body.turma.turma)*/
            this.cadastro()
        },
        cadastro() {
            dadosSerie(this, this.body)
        }
    }
}
</script>