<template>
    <button class="btn btn-success" @click.prevent="atualizar" :disabled="validaCampoObrigatorio">
        <load>
			<span>Atualizar dados</span>
		</load>
    </button>
</template>

<script>
import { dadosSerie } from '@functions/edita'
import load from '@shared/load'

export default {
    name: 'botaoEditaSerie',
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
        atualizar() {
            dadosSerie(this, this.body)
        }
    }
}
</script>