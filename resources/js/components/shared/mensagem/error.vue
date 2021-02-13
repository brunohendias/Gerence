<template>
    <div class="alert alert-danger p-2"> <span class="ml-4">{{ msgError }}</span> </div>
</template>

<script>
export default {
    props: {
        msgError: {
            type: String,
            default: 'Erro'
        }
    }
}
</script>