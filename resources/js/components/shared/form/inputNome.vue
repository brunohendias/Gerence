<template>
    <div>
        <label for="nome"><strong>Nome</strong></label>
        <input type="text" class="form-control" name="nome" v-model="filtro.nom_can" placeholder="Ex: João Silva"/>
    </div>
</template>

<script>
export default {
    name: 'inputNome',
    props: {
        filtro: {
            type: Object,
            default: {}
        }
    }
}
</script>