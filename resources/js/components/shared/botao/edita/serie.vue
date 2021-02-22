<template>
    <button class="btn btn-success" @click.prevent="atualizar" :disabled="editando">Atualizar dados</button>
</template>

<script>
import edita from '@functions/edita'

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
        }
    },
    methods: {
        atualizar() {
            this.editando = true
            edita.dadosSerie(this, this.body)
            this.editando = false
        }
    }
}
</script>