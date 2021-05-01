<template>
    <button class="btn btn-success" @click.prevent="preCadastro" :disabled="validaCampoObrigatorio">
        <load>
			<span>Cadastrar</span>
		</load>
    </button>
</template>

<script>
import { dadosSerie } from '@functions/cadastra'
import load from '@template/load'

export default {
    name: 'botaoCadastraSerie',
    components: {
        load
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
            this.cadastro()
        },
        cadastro() {
            dadosSerie(this, this.body)
        }
    }
}
</script>