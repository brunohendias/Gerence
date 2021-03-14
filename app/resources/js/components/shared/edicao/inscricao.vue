<template>
    <div class="bg-white p-3 rounded" id="cadastro">
        <h4><strong>Enturme o candidato</strong></h4>
        <hr>
        <form method="POST">
            <div class="row">
                <div class="col-md-6">
                    <label>Nome completo *</label>
                    <input class="form-control" name="nome" type="text" placeholder="Nome" 
                        disabled="true" v-model="inscricao.nom_insc" required/>
                    
                    <label>E-mail *</label>
                    <input class="form-control" name="email" type="email" placeholder="Example@example.com" 
                        v-model="inscricao.email" required maxlength="50" />
                    <msg v-if="msg.email" :msg="msg.email" tipo="notfound" />
                </div>
                <div class="col-md-6">
                    <label>Telefone celular *</label>
                    <input class="form-control" name="tell" type="text" placeholder="(XX) X XXXX XXXX" 
                        v-model="inscricao.telefone" v-mask-phone.br />
                    <msg v-if="msg.telefone" :msg="msg.telefone" tipo="notfound" />
                    
                    <label>CPF *</label>
                    <input class="form-control" name="cpf" type="text" placeholder="000.000.00-00" 
                        disabled="true" v-model="inscricao.cpf" v-mask-cpf.br />
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" v-if="inscricao.serie">
                    <label>Série à cursar *</label>
                    <input class="form-control" name="serie" type="text" v-model="inscricao.serie.serie" 
                        placeholder="Série" disabled="true" required/>
                </div>
                <div class="col-md-6">
                    <label>Tipo de atenção com o candidato *</label>
                    <ModelListSelect :list="atencoes" v-model="inscricao.cod_atencao" option-value="cod_atencao" 
                        option-text="atencao" placeholder="Selecione o tipo de atenção" />
                    <msg v-if="msg.atencao" :msg="msg.atencao" tipo="notfound" />
                </div>
            </div>
        </form>
        <listaSerieCandidato class="mt-5" :inscricao="inscricao"/>
        <div class="row">
            <botaoEditaInscricao class="mt-5 ml-auto mr-4"/>
        </div>
    </div>
</template>

<script>
import listaSerieCandidato from '@lista/serieCandidato'
import { ModelListSelect } from 'vue-search-select'
import botaoEditaInscricao from '@botao/edita/inscricao'
import { atencoes } from '@functions/busca'
import msg from '@msg/msg'

export default {
    name: 'editarInscricao',
    components: {
        listaSerieCandidato,
        ModelListSelect,
        botaoEditaInscricao,
        msg
    },
    data() {
        return {
            atencoes: [],
            msg: {
                status: null,
                nom_insc: null,
                email: null,
                telefone: null,
                cpf: null,
                serie: null,
                turno: null,
                atencao: null,
                turma: null,
                professor: null
            }
        }
    },
    created() {
        atencoes(this)
    },
    computed: {
        inscricao() {
            return this.$store.state.inscricoes.inscricao
        }
    }
}

</script>

<style scoped>
    label {
        margin-top: 20px;
    }
</style>