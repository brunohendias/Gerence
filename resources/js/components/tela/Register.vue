<template>
    <auth title="Registre-se">
        <form class="form" method="POST" action="/register">
            <div class="form-group" v-for="(input, i) in inputs" :key="i">
                <label :for="input.name" class="col-form-label text-md-right">{{ input.label }}</label>

                <input :id="input.name" :type="input.tipo" class="form-control" :name="input.name" 
                    v-model="dados[input.name]" required :autocomplete="input.name" :placeholder="input.placeholder"/>
                
                <div class="error">
                    {{ errors[input.name] ? errors[input.name][0] : '' }}
                </div>
            </div>
            <input type="hidden" name="_token" :value="csrf">
            
            <div class="form-group text-right">
                <botaoAuth title="Registrar"/>
            </div>
        </form>
    </auth>
</template>

<script>
import auth from '@/components/shared/template/auth'
import botaoAuth from '@botao/auth/auth'

export default {
    name: 'Register',
    components: {
        auth,
        botaoAuth
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
                {label: 'Nome', name: 'name', tipo: 'text', placeholder: 'Example'},
                {label: 'Email', name: 'email', tipo: 'email', placeholder: 'example@example.com'},
                {label: 'Senha', name: 'password', tipo: 'password', placeholder: '********'},
                {label: 'Confirme sua senha', name: 'password_confirmation', tipo: 'password', placeholder: '********'}
            ],
            errors: {
                name: [],
                email: [],
                password: []
            }
        }
    },
    computed: {
        csrf() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    }
}
</script>