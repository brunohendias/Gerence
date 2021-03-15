<template>
    <div class="alert alert-success">{{ msg }}</div>
</template>

<script>
export default {
    props: {
        msg: {
            type: String,
            default: 'Sucesso'
        }
    }
}
</script>