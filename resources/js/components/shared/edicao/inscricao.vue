<template>
    <div class="bg-white p-3 rounded" id="cadastro">
        <h4><strong>Enturme o candidato</strong></h4>
        <hr>
        <form method="POST">
            <div class="row">
                <div class="col-md-6">
                    <label>Nome completo *</label>
                    <input class="form-control" name="nome" type="text" v-model="inscricao.nom_insc" 
                        placeholder="Nome" disabled="true" required/>
                    <msgSemResultado v-if="msg.nom_insc" :msg="msg.nom_insc" />
                    
                    <label>E-mail *</label>
                    <input class="form-control" name="email" type="email" 
                        placeholder="Example@example.com" v-model="inscricao.email" required maxlength="50" />
                    <msgSemResultado v-if="msg.email" :msg="msg.email" />
                    
                    <label>Telefone celular *</label>
                    <input class="form-control" name="tell" type="text" 
                        placeholder="(XX) X XXXX XXXX" v-model="inscricao.telefone" v-mask-phone.br />
                    <msgSemResultado v-if="msg.telefone" :msg="msg.telefone" />
                    
                    <label>CPF *</label>
                    <input class="form-control" name="cpf" type="text" 
                        placeholder="000.000.00-00" v-model="inscricao.cpf" v-mask-cpf.br disabled="true" maxlength="14" />
                    <msgSemResultado v-if="msg.cpf" :msg="msg.cpf" />
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-7">
                            <label>Série à cursar *</label>
                            <ModelListSelect :list="series" v-model="inscricao.cod_serie" option-value="cod_serie" 
                                option-text="serie" placeholder="Selecione a serie" />
                            <msgSemResultado v-if="msg.serie" :msg="msg.serie" />
                        </div>
                        <div class="col-md-5">
                            <label>Turno *</label>
                            <ModelListSelect :list="turnos" v-model="inscricao.cod_turno" option-value="cod_turno" 
                                option-text="turno" placeholder="Selecione o turno" :isDisabled="!inscricao.cod_serie"/>
                            <msgSemResultado v-if="msg.turno" :msg="msg.turno" />
                        </div>
                        <div class="col-md-7">
                            <label>Tipo de atenção com o candidato *</label>
                            <ModelListSelect :list="atencoes" v-model="inscricao.cod_atencao" option-value="cod_atencao" 
                                option-text="atencao" placeholder="Selecione o tipo de atenção" :isDisabled="!inscricao.cod_turno"/>
                            <msgSemResultado v-if="msg.atencao" :msg="msg.atencao" />
                        </div>
                        <div class="col-md-5">
                            <label>Turma *</label>
                            <ModelListSelect :list="turmas" v-model="inscricao.cod_turma" option-value="cod_turma" 
                                option-text="turma" placeholder="Selecione a turma" :isDisabled="!inscricao.cod_atencao"/>
                            <msgSemResultado v-if="msg.turma" :msg="msg.turma" />
                        </div>
                        <div class="col-md-7">
                            <label>Professor *</label>
                            <ModelListSelect :list="professores" v-model="inscricao.cod_prof" option-value="cod_prof" 
                                option-text="nom_prof" placeholder="Selecione o professor" :isDisabled="!inscricao.cod_turma"/>
                            <msgSemResultado v-if="msg.professor" :msg="msg.professor" />
                        </div>
                    </div>
                    <div class="row">
                        <botaoEditaInscricao class="mt-5 ml-auto mr-4"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import { ModelListSelect } from 'vue-search-select'
import msgSemResultado from '../mensagem/semResultado'
import botaoEditaInscricao from '../botao/edita/inscricao'
import busca from '../../../core/functions/busca'
//import limpaMsg from '../../../core/helpers/limpaMsg'

export default {
    name: 'editarInscricao',
    components: {
        ModelListSelect,
        msgSemResultado,
        botaoEditaInscricao
    },
    data() {
        return {
            series: [],
            turnos: [],
            turmas: [],
            professores: [],
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
                cod_atencao: this.inscricao.cod_atencao
            }
        }
    },
    watch: {
        'inscricao.serie'(newValue) {
            if(newValue) {
                this.series = []
                this.series = [newValue]
            }
        },
        'inscricao.turno'(newValue) {
            if(!newValue) {
                busca.turnos(this)
            } else if (newValue) {
                this.turnos = []
                this.turnos = [newValue]
                !this.inscricao.cod_turma ? busca.turmas(this) : null
            }
        },
        'inscricao.cod_atencao'() {
            busca.dadosProfessores(this, this.filtro)
        }
    }
}

</script>

<style scoped>
    label {
        margin-top: 20px;
    }
</style>