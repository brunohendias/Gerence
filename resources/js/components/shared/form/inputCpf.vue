<template>
    <div>
        <label for="cpf">CPF</label>
        <input type="text" class="form-control" name="cpf" v-model="filtro.cpf" 
            placeholder="XXX.XXX.XXX-XX" v-mask="'###.###.###-##'" maxlength="14"/>
    </div>
</template>

<script>
export default {
    name: 'inputCpf',
    props: {
        filtro: {
            type: Object,
            default: {}
        }
    }
}
</script>