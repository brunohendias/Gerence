<template>
    <div>
        <label for="nome">Nome</label>
        <input type="text" placeholder="Ex: João Silva" class="form-control" name="nome" v-model="filtro.nom_aluno" />
    </div>
</template>

<script>
export default {
    name: 'inputNomeAluno',
    computed: {
        filtro() {
            return this.$store.state.generic.filtro
        }
    }
}
</script>