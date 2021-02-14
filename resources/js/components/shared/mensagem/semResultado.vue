<template>
    <div class="alert alert-warning">{{ msg }}</div>
</template>

<script>
export default {
    props: {
        msg: {
            type: String,
            default: 'Não encontramos resultado'
        }
    }
}
</script>