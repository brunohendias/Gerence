<template>
    <button class="btn btn-success" @click.prevent="cadastrar" :disabled="cadastrando">
	    Cadastrar
    </button>
</template>

<script>
export default {
    name: 'botaoCadastraSerie',
    data() {
        return {
            cadastrando: false
        }
    },
    computed: {
        body() {
            return this.$store.state.dados.serie.serie
        }
    },
    methods: {
        cadastrar() {
            this.cadastrando = true
            apiDadosSerie.cadastrar(this.body).then(response => {
                this.cadastrando = false
                let icon = 'success'
                let title = ''
                if(response.data.success) {
                    title = response.data.data.msg
                } else {
                	title = response.data.error.message
                    icon = 'error'
                }
                swal({ title, icon })
            }).catch(err => {
            	swal({
                    title: "Erro ao cadastrar essa série.",
                    icon: 'error'
                })
            })
        }
    }
}
</script>