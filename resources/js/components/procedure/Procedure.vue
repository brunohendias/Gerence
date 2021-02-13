<template>
    <div>
        <div class="row">
            <div v-if="msg" class="col-sm-12">
                <div v-if="salvo" class="alert alert-success">{{msg}}</div>
                <div v-else class="alert alert-danger">{{msg}}</div>
            </div>
            <h2 class="mb-2 text-danger">Procedure</h2>
        </div>
        <div class="row">
            <Registro class="w-50" nome="Nome">
                <input class="w-100" type="text" v-model="dados_aluno.nome" name="nome" onkeypress="return event.charCode > 64 && event.charCode < 91 || event.charCode > 96 && event.charCode < 123 || event.charCode > 191 && event.charCode <= 255 || event.charCode == 32" placeholder="Nome"/>
            </Registro>
            <Registro class="w-50" nome="CPF">
                <input class="w-100" type="text" v-model="dados_aluno.cpf" name="cpf" placeholder="000.000.000-00" v-mask-cpf/>
            </Registro>
            <Registro class="w-25 mt-2" v-for="i in 6" :key="i" :nome="'Nota ' + i">
                <input class="w-100" type="text" maxlength="5" v-model="dados_aluno.notas[i-1]" :name="'nota'+i" placeholder="00,00" v-mask-number/>
            </Registro>
            <Registro nome="Media:" class="mt-2">
                <input id="media" v-if="dados_aluno.resultado != undefined" type="text" readonly :value="dados_aluno.media.toFixed(2) + ' ' + dados_aluno.resultado" :class="corResultado" name="media"/>
                <input id="media" v-else type="text" readonly :value="dados_aluno.media.toFixed(2)" :class="corResultado" name="media"/>
            </Registro>
            <div class="my-4">
                <button class="btn btn-dark" @click="calcularMedia()" :disabled="dados_aluno.notas.length < 2" name="btn-media">Calcular Media</button>
                <button class="btn btn-primary" @click="salvarDadosAluno()" :disabled="dados_aluno.media == 0">Salvar aluno</button>
            </div>
        </div>
    </div>
</template>

<script>
import Registro from '../shared/Registro'
import apiDadosAlunos from '../../core/apiDadosAlunos'

export default {

    name: 'Procedure',

    components: {
        Registro
    },

    data() {
        return {
            dados_aluno: {
                nome: '',
                cpf: '',
                notas: [],
                media: 0,
                resultado: '',
            },
            corResultado: '',
            salvo: false,
            msg: ''
        }
    },

    methods: {
        calcularMedia(){
            let media = 0
            let qtdNotas = 0
            let total = 0
            let notas = this.dados_aluno.notas
            if(notas != ''){
                for(let i=0;i < 6;i++){
                    if(notas[i] === undefined) {
                        notas[i] = ''
                    }else if(notas[i] != ''){
                        notas[i].replace(",", ".")
                        total += parseFloat(notas[i])
                        qtdNotas += 1
                    }
                }
            	media = total / qtdNotas
                this.dados_aluno.media = media
                if(media >= 5){
                  this.corResultado = 'text-success'
                  this.dados_aluno.resultado = 'Aprovado'
                }else{
                  this.corResultado = 'text-danger'
                  this.dados_aluno.resultado = 'Reprovado'
                }
            }
        },
        async salvarDadosAluno() {
            let notas = this.dados_aluno.notas
            let dados = {
                'nome': this.dados_aluno.nome,
                'cpf': this.dados_aluno.cpf,
                'media': this.dados_aluno.media.toFixed(2),
                'nota1': notas[0],
                'nota2': notas[1],
                'nota3': notas[2],
                'nota4': notas[3],
                'nota5': notas[4],
                'nota6': notas[5],
                'situacao': this.dados_aluno.resultado
            }
            await apiDadosAlunos.adicionarAluno(dados).then(response => {
                this.msg = "Dados salvo com sucesso"
                this.salvo = true
                this.dados_aluno = {
                    nome: '',
                    cpf: '',
                    notas: [],
                    media: 0,
                    resultado: ''
                }
                this.corResultado = ''
                this.$emit('novoAlunoCadastrado', true)
            }).catch(err => {
                this.msg = "Erro ao salvar os dados"
                this.salvo = false
            })
            setTimeout(() => {
                this.msg = ""
                this.salvo = false
            }, 5000)
        }
    }
}
</script>

<style lang="css" scoped>
    #media{
        width: 119%;
    }
</style>