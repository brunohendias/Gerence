<template>
    <button type="submit" class="btn btn-primary float-right" @click.prevent="registrar">
        <load>
            <span>Registrar</span>
        </load>
    </button>
</template>

<script>
import load from '@shared/load'
import { register } from '@functions/auth'

export default {
    name: 'botaoLogin',
    components: {
        load
    },
    props: {
        dados: {
            type: Object,
            default: {}
        }
    },
    methods: {
        registrar() {
            register(this, this.dados)
        }
    }
}
</script>