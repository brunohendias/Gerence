<template>
    <button @click.prevent="loginSocial" class="btn">
        <img :src="icons[provider]" :alt="provider">
    </button>
</template>

<script>
import { loginSocial } from '@functions/auth'

export default {
    name: "loginSocial",
    props: {
        provider: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            icons: {
                github: 'https://img.icons8.com/fluent/github.png',
                google: 'https://img.icons8.com/color/google-logo.png'
            }
        }
    },
    methods: {
        loginSocial() {
            loginSocial(this.provider)
        }
    }
}
</script>