<template>
    <auth title="Login">
        <form class="form" method="POST" action="/login">
            <div class="form-group">
                <label for="email" class="col-form-label text-md-right">Email</label>

                <input id="email" type="email" class="form-control" name="email" v-model="dados.email" 
                    required autocomplete="email" autofocus placeholder="example@example.com">

                <div class="error">
                    {{ emailError }}
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="col-form-label text-md-right">Senha</label>

                <input id="password" type="password" class="form-control" name="password" 
                    required autocomplete="current-password" v-model="dados.password" placeholder="********">

                <div class="error">
                    {{ passwordError }}
                </div>
            </div>
            <input type="hidden" name="_token" :value="csrf">

            <div class="form-group text-right">
                <botaoAuth title="Logar"/>
            </div>
            <hr>
            <div class="text-center">
                <h5>Faça login com sua rede social</h5>
                <loginSocial provider="github" />
                <loginSocial provider="google" />
            </div>
        </form>
    </auth>
</template>

<script>
import auth from '@/components/shared/template/auth'
import botaoAuth from '@botao/auth/auth'
import loginSocial from '@botao/auth/loginSocial'

export default {
    name: 'Login',
    components: {
        auth,
        botaoAuth,
        loginSocial
    },
    data() {
        return {
            dados: {
                email: null,
                password: null
            },
            errors: { 
                email: [], 
                password: [] 
            }
        }
    },
    computed: {
        emailError() {
            return this.errors.email ? this.errors.email[0] : null
        },
        passwordError() {
            return this.errors.password ? this.errors.password[0] : null
        },
        csrf() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    }
}
</script>