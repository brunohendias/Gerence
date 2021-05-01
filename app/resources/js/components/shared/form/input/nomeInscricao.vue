<template>
    <div>
        <label for="nome">Nome</label>
        <input type="text" placeholder="Ex: João Silva" class="form-control" name="nome" v-model="filtro.nom_insc" />
    </div>
</template>

<script>
export default {
    name: 'inputNomeInscricao',
    computed: {
        filtro() {
            return this.$store.state.generic.filtro
        }
    }
}
</script>
