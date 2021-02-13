<template>
    <div class="bg-white p-3 rounded" id="cadastro">
        <h4><strong>Enturme o candidato</strong></h4>
        <hr>
        <form method="POST">
            <div class="row">
                <div class="col-md-6">
                    <label>Nome completo *</label>
                    <input class="form-control" name="nome" type="text" v-model="inscricao.nominsc" 
                        placeholder="Nome" disabled="true" required/>
                    <msgSemResultado v-if="msg.nominsc" :msg="msg.nominsc" />
                    
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
                            <label>Serie à cursar *</label>
                            <ModelListSelect :list="dados.series" v-model="inscricao.codserie" option-value="codserie" 
                                option-text="serie" placeholder="Selecione a serie" />
                            <msgSemResultado v-if="msg.serie" :msg="msg.serie" />
                        </div>
                        <div class="col-md-5">
                            <label>Turno *</label>
                            <ModelListSelect :list="dados.turnos" v-model="inscricao.codturno" option-value="codturno" 
                                option-text="turno" placeholder="Selecione o turno" :isDisabled="!inscricao.codserie"/>
                            <msgSemResultado v-if="msg.turno" :msg="msg.turno" />
                        </div>
                        <div class="col-md-7">
                            <label>Tipo de atenção com o candidato *</label>
                            <ModelListSelect :list="dados.atencoes" v-model="inscricao.codatencao" option-value="codatencao" 
                                option-text="atencao" placeholder="Selecione o tipo de atenção" :isDisabled="!inscricao.codturno"/>
                            <msgSemResultado v-if="msg.atencao" :msg="msg.atencao" />
                        </div>
                        <div class="col-md-5">
                            <label>Turma *</label>
                            <ModelListSelect :list="dados.turmas" v-model="inscricao.codturma" option-value="codturma" 
                                option-text="turma" placeholder="Selecione a turma" :isDisabled="!inscricao.codatencao"/>
                            <msgSemResultado v-if="msg.turma" :msg="msg.turma" />
                        </div>
                        <div class="col-md-7">
                            <label>Professor *</label>
                            <ModelListSelect :list="dados.professores" v-model="inscricao.codprof" option-value="codprof" 
                                option-text="nomprof" placeholder="Selecione o professor" :isDisabled="!inscricao.codturma"/>
                            <msgSemResultado v-if="msg.professor" :msg="msg.professor" />
                        </div>
                    </div>
                </div>
            <botaoEditaInscricao />
            </div>
        </form>
    </div>
</template>

<script>
import { ModelListSelect } from 'vue-search-select'
import msgSemResultado from '../mensagem/semResultado'
import botaoEditaInscricao from '../botao/botaoEditaInscricao'
import apiAtencoes from '../../../core/entidade/apiAtencoes'
import apiDadosSerie from '../../../core/dados/apiDadosSerie'
import apiDadosProfessor from '../../../core/dados/apiDadosProfessor'
import util from '../../../Util/util'

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
                nominsc: null,
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
                codserie: this.inscricao.codserie,
                codturno: this.inscricao.codturno,
                codatencao: this.inscricao.codatencao
            }
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
                !this.inscricao.codturma ? this.buscaTurmas() : null
            }
        },
        'inscricao.codatencao'(newValue) {
            this.buscaProfessores()
        }
    },
    methods: {
        limpaMensagens() {
            this.msg = {status: null, nominsc: null,email: null,telefone: null,cpf: null,
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
                        this.inscricao.codprof = professor.professor.codprof
                    })
                } else {
                    this.msg.professor = response.data.error.message
                }
            })
        }
    }
}
</script>