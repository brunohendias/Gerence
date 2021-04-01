<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registre-se</div>

                    <div class="card-body">
                        <form class="form">
                            <div class="form-group row" v-for="(input, i) in inputs" :key="i">
                                <label :for="input.name" class="col-md-4 col-form-label text-md-right">{{ input.label }}</label>

                                <div class="col-md-6">
                                    <input :id="input.name" :type="input.tipo" class="form-control" :name="input.name" 
                                        v-model="dados[input.name]" required :autocomplete="input.name" />
                                    
                                    <div class="error">
                                        {{ errors[input.name] ? errors[input.name][0] : '' }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <botaoRegister :dados="dados" @error="errors = $event"/>
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
import botaoRegister from '@botao/auth/register'

export default {
    name: 'Register',
    components: {
        botaoRegister
    },
    data() {
        return {
            dados: {
                name: null,
                email: null,
                password: null,
                password_confirmation: null
            },
            inputs: [
                {label: 'Nome', name: 'name', tipo: 'text'},
                {label: 'Email', name: 'email', tipo: 'email'},
                {label: 'Senha', name: 'password', tipo: 'password'},
                {label: 'Confirme sua senha', name: 'password_confirmation', tipo: 'password'}
            ],
            errors: {
                name: [],
                email: [],
                password: [],
                password_confirmation: []
            }
        }
    }
}
</script>