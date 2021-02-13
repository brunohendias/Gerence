<template>
    <div class="alert alert-success p-2"> <span class="ml-4">{{ msgSuccess }}</span> </div>
</template>

<script>
export default {
    props: {
        msgSuccess: {
            type: String,
            default: 'Sucesso'
        }
    }
}
</script>