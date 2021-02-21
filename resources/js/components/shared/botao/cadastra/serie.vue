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
            const body = {
                cod_serie: this.body.serie.cod_serie,
                cod_turno: this.body.turno.cod_turno,
                cod_turma: this.body.turma.cod_turma,
                limite_alunos: this.body.limite_alunos
            }
            cadastra.serie(this, this.body.serie.serie)
            /*cadastra.turno(this, this.body.turno.turno)
            cadastra.turma(this, this.body.turma.turma)*/
            cadastra.dadosSerie(this, body)
            this.cadastrando = false
        }
    }
}
</script>