<template>
    <span class="text-danger">{{msg}}</span>
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