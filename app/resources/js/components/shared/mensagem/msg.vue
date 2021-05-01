<template>
    <div class="alert" :class="tipoMsg(tipo)">{{ msg }}</div>
</template>

<script>
export default {
    props: {
        tipo: {
            type: String,
            required: true
        },
        msg: {
            type: String,
            default: 'Sucesso'
        }
    },
    methods: {
        tipoMsg(tipo) {
            if (tipo == 'successo') {
                return 'alert-success'
            } else if (tipo == 'notfound') {
                return 'alert-warning'
            } else if (tipo == 'error') {
                return 'alert-danger'
            }

            return ''
        }
    }
}
</script>