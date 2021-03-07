<template>
    <button class="btn btn-success" @click.prevent="atualizar" :disabled="editando || validaCampoObrigatorio">
        <i v-if="editando" class="spinner-border spinner-border-sm"></i>
		<span v-else>Atualizar dados</span>
    </button>
</template>

<script>
import { dadosSerie } from '@functions/edita'

export default {
    name: 'botaoEditaSerie',
    data() {
        return {
            editando: false
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
        atualizar() {
            this.editando = true
            dadosSerie(this, this.body)
            this.editando = false
        }
    }
}
</script>