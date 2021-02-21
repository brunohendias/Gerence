<template>
    <button class="btn btn-success" @click.prevent="preCadastro" :disabled="cadastrando">
	    Cadastrar
    </button>
</template>

<script>
import cadastra from '../../../../core/functions/cadastra'

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
            cadastra.dadosSerie(this, this.body)
        }
    }
}
</script>