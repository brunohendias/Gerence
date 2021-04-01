<template>
    <button type="submit" class="btn btn-primary" @click.prevent="logar">
        <load>
            <span>Logar</span>
        </load>
    </button>
</template>

<script>
import load from '@shared/load'
import { login } from '@functions/auth'

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
        logar() {
            login(this, this.dados)
        }
    }
}
</script>