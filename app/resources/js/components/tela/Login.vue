<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white">Login</div>

                    <div class="card-body">
                        <form class="form">
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" 
                                        v-model="dados.email" required autocomplete="email" autofocus placeholder="example@example.com">

                                    <div class="error">
                                        {{ emailError }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" 
                                        required autocomplete="current-password" v-model="dados.password" placeholder="********">

                                    <div class="error">
                                        {{ passwordError }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4 text-right">
                                    <botaoLogin :dados="dados" @error="errors = $event"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import botaoLogin from '@botao/auth/login'

export default {
    name: 'Login',
    components: {
        botaoLogin
    },
    data() {
        return {
            dados: {},
            errors: { email: [], password: [] }
        }
    },
    computed: {
        emailError() {
            return this.errors.email ? this.errors.email[0] : null
        },
        passwordError() {
            return this.errors.password ? this.errors.password[0] : null
        }
    }
}
</script>