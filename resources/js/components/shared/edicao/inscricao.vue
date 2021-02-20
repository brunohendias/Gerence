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
                            <ModelListSelect :list="dados.series" v-model="inscricao.cod_serie" option-value="cod_serie" 
                                option-text="serie" placeholder="Selecione a serie" />
                            <msgSemResultado v-if="msg.serie" :msg="msg.serie" />
                        </div>
                        <div class="col-md-5">
                            <label>Turno *</label>
                            <ModelListSelect :list="dados.turnos" v-model="inscricao.cod_turno" option-value="cod_turno" 
                                option-text="turno" placeholder="Selecione o turno" :isDisabled="!inscricao.cod_serie"/>
                            <msgSemResultado v-if="msg.turno" :msg="msg.turno" />
                        </div>
                        <div class="col-md-7">
                            <label>Tipo de atenção com o candidato *</label>
                            <ModelListSelect :list="dados.atencoes" v-model="inscricao.cod_atencao" option-value="cod_atencao" 
                                option-text="atencao" placeholder="Selecione o tipo de atenção" :isDisabled="!inscricao.cod_turno"/>
                            <msgSemResultado v-if="msg.atencao" :msg="msg.atencao" />
                        </div>
                        <div class="col-md-5">
                            <label>Turma *</label>
                            <ModelListSelect :list="dados.turmas" v-model="inscricao.cod_turma" option-value="cod_turma" 
                                option-text="turma" placeholder="Selecione a turma" :isDisabled="!inscricao.cod_atencao"/>
                            <msgSemResultado v-if="msg.turma" :msg="msg.turma" />
                        </div>
                        <div class="col-md-7">
                            <label>Professor *</label>
                            <ModelListSelect :list="dados.professores" v-model="inscricao.cod_prof" option-value="cod_prof" 
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
import apiAtencoes from '../../../core/entidade/apiAtencoes'
import apiDadosSerie from '../../../core/dados/apiDadosSerie'
import apiDadosProfessor from '../../../core/dados/apiDadosProfessor'

export default {
    name: 'editarInscricao',
    components: {
        ModelListSelect,
        msgSemResultado,
        botaoEditaInscricao
    },
    data() {
        return {
            dados: {
                series: [],
                turnos: [],
                turmas: [],
                professores: [],
                atencoes: []
            },
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
        this.buscaAtencoes()
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
        },
        candidato() {
            return this.$store.state.inscricoes.inscricao
        }
    },
    watch: {
        'inscricao.serie'(newValue) {
            if(newValue) {
                this.dados.series = []
                this.dados.series = [newValue]
            }
        },
        'inscricao.turno'(newValue) {
            if(!newValue) {
                this.buscaTurnos()
            } else if (newValue) {
                this.dados.turnos = []
                this.dados.turnos = [newValue]
                !this.inscricao.cod_turma ? this.buscaTurmas() : null
            }
        },
        'inscricao.cod_atencao'(newValue) {
            this.buscaProfessores()
        }
    },
    methods: {
        limpaMensagens() {
            this.msg = {status: null, nom_insc: null,email: null,telefone: null,cpf: null,
                serie: null,turno: null,atencao: null,turma: null,professor: null}
        },
        async buscaAtencoes() {
            this.dados.atencoes = []
            await apiAtencoes.buscaAtencoes().then(response => {
                if(response.data.success) {
                    this.dados.atencoes = response.data.data.atencoes
                } else {
                    this.msg.atencao = response.data.error.message
                }
            })
        },
        async buscaTurnos() {
            this.limpaMensagens()
            this.dados.turnos = []
            await apiDadosSerie.buscaTurnos(this.filtro).then(response => {
                if(response.data.success) {
                    response.data.data.turnos.map(turno => {
                        this.dados.turnos.push(turno.turno)
                    })
                } else {
                    this.msg.turno = response.data.error.message
                }
            })
        },
        async buscaTurmas() {
            this.limpaMensagens()
            this.dados.turmas = []
            await apiDadosSerie.buscaTurmas(this.filtro).then(response => {
                if(response.data.success) {
                    response.data.data.turmas.map(turma => {
                        if(turma.qtd_alunos < turma.limite_alunos){
                            this.dados.turmas.push(turma.turma)
                        }
                    })
                } else {
                    this.msg.turma = response.data.error.message
                }
            })
        },
        async buscaProfessores() {
            this.limpaMensagens()
            this.dados.professores = []
            await apiDadosProfessor.buscaProfessores(this.filtro).then(response => {
                if(response.data.success) {
                    response.data.data.professores.map(professor => {
                        this.dados.professores.push(professor.professor)
                    })
                    this.inscricao.cod_prof = this.dados.professores[0].cod_prof
                } else {
                    this.msg.professor = response.data.error.message
                    this.inscricao.cod_prof = null
                }
            })
        }
    }
}
</script>

<style scoped>
    label {
        margin-top: 20px;
    }
</style>