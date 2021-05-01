<template>
    <div>
        <label for="nome">Nome</label>
        <input type="text" placeholder="Ex: João Silva" class="form-control" name="nome" v-model="filtro.nom_can" />
    </div>
</template>

<script>
export default {
    name: 'inputNomeCandidato',
    computed: {
        filtro() {
            return this.$store.state.generic.filtro
        }
    }
}
</script>