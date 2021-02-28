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
                    <msgSemResultado v-if="msg.email" :msg="msg.email" />
                    
                    <label>Telefone celular *</label>
                    <input class="form-control" name="tell" type="text" placeholder="(XX) X XXXX XXXX" 
                        v-model="inscricao.telefone" v-mask-phone.br />
                    <msgSemResultado v-if="msg.telefone" :msg="msg.telefone" />
                    
                    <label>CPF *</label>
                    <input class="form-control" name="cpf" type="text" placeholder="000.000.00-00" 
                        disabled="true" v-model="inscricao.cpf" v-mask-cpf.br />
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-7" v-if="inscricao.serie">
                            <label>Série à cursar *</label>
                            <input class="form-control" name="serie" type="text" v-model="inscricao.serie.serie" 
                                placeholder="Série" disabled="true" required/>
                        </div>
                        <div class="col-md-5" v-if="inscricao.turno">
                            <label>Turno *</label>
                            <input class="form-control" name="turno" type="text" v-model="inscricao.turno.turno" 
                                placeholder="Turno" disabled="true" required/>
                        </div>
                        <div class="col-md-7">
                            <label>Tipo de atenção com o candidato *</label>
                            <ModelListSelect :list="atencoes" v-model="inscricao.cod_atencao" option-value="cod_atencao" 
                                option-text="atencao" placeholder="Selecione o tipo de atenção" />
                            <msgSemResultado v-if="msg.atencao" :msg="msg.atencao" />
                        </div>
                        <div class="col-md-5">
                            <label>Turma *</label>
                            <ModelListSelect :list="turmas" v-model="inscricao.cod_turma" option-value="cod_turma" 
                                option-text="turma" placeholder="Selecione a turma" />
                            <msgSemResultado v-if="msg.turma" :msg="msg.turma" />
                        </div>
                        <div class="col-md-7">
                            <label>Professor *</label>
                            <ModelListSelect :list="professores" v-model="inscricao.cod_prof" option-value="cod_prof" 
                                option-text="nom_prof" placeholder="Selecione o professor" />
                            <msgSemResultado v-if="msg.professor" :msg="msg.professor" />
                        </div>
                    </div>
                    <div class="row">
                        <botaoEditaInscricao class="mt-5 ml-auto mr-4" :seriev="serie_v"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import { ModelListSelect } from 'vue-search-select'
import msgSemResultado from '@msg/semResultado'
import botaoEditaInscricao from '@botao/edita/inscricao'
import busca from '@functions/busca'
//import limpaMsg from '@helpers/limpaMsg'

export default {
    name: 'editarInscricao',
    components: {
        ModelListSelect,
        msgSemResultado,
        botaoEditaInscricao
    },
    data() {
        return {
            turmas: [],
            professores: [],
            atencoes: [],
            serie_v: 0,
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
        busca.atencoes(this)
    },
    computed: {
        inscricao() {
            return this.$store.state.inscricoes.inscricao
        },
        filtro() {
            return {
                cod_serie: this.inscricao.cod_serie,
                cod_turno: this.inscricao.cod_turno,
                cod_turma: this.inscricao.cod_turma,
                cod_prof: this.inscricao.cod_prof,
                cod_atencao: this.inscricao.cod_atencao
            }
        }
    },
    watch: {
        'inscricao.turno'() {
            busca.dadosSerie(this, this.filtro)
        },
        'inscricao.atencao'() {
            console.log('teste')
        },
        'inscricao.turma'() {
            busca.dadosSerie(this, this.filtro)
        },
        'inscricao.nom_prof'() {
            busca.dadosSerie(this, this.filtro)
        }
    }
}

</script>

<style scoped>
    label {
        margin-top: 20px;
    }
</style>