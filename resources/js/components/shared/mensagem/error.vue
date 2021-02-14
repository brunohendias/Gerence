<template>
    <div class="alert alert-danger">{{ msg }}</div>
</template>

<script>
export default {
    props: {
        msg: {
            type: String,
            default: 'Erro'
        }
    }
}
</script>