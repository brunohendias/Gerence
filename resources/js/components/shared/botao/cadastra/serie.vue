<template>
    <button class="btn btn-success" @click.prevent="preCadastro" :disabled="cadastrando || validaCampoObrigatorio">
        <i v-if="cadastrando" class="spinner-border spinner-border-sm"></i>
        <span v-else>Cadastrar</span>
    </button>
</template>

<script>
import { dadosSerie } from '@functions/cadastra'

export default {
    name: 'botaoCadastraSerie',
    data() {
        return {
            cadastrando: false
        }
    },
    computed: {
        body() {
            return this.$store.state.dados.serie.serie
        },
        validaCampoObrigatorio() {
            return !(this.body.cod_serie && this.body.cod_turno && 
                this.body.cod_turma && this.body.limite_alunos)
        }
    },
    methods: {
        preCadastro() {
            this.cadastrando = true
            /*cadastra.serie(this, this.body.serie.serie)
            cadastra.turno(this, this.body.turno.turno)
            cadastra.turma(this, this.body.turma.turma)*/
            this.cadastro()
            this.cadastrando = false
        },
        cadastro() {
            dadosSerie(this, this.body)
        }
    }
}
</script>