<template>
    <div class="bg-white p-3 rounded" id="cadastro">
        <h4>{{ titulo }}</h4>
        <hr>
        <form method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div v-if="editando">
                        <selectSeries :filtro="dados" :disabled="true"/>
                    </div>
                    <div v-else-if="cadastrando">
                        <label for="serie">Série</label>
                        <ModelListSelect :list="series" v-model="dados.cod_serie" option-value="cod_serie" option-text="serie" 
                            placeholder="Selecione ou cadastre uma série" @searchchange="buscaSeries"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <selectTurnos :filtro="dados" />
                        </div>
                        <div class="col-md-6">
                            <selectTurmas :filtro="dados" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label>Total de alunos</label>
                            <input class="form-control" name="turno" type="text" :value="dados.qtd_alunos" disabled="true"/>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label>Limite de alunos</label>
                            <input class="form-control" name="turma" type="text" :value="dados.limite_alunos"/>
                        </div>
                    </div>
                    <div class="row">
                        <botaoEditaSerie v-if="editando" class="mt-5 ml-auto mr-4"/>
                        <botaoCadastraSerie v-else-if="cadastrando" class="mt-5 ml-auto mr-4"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import { ModelListSelect } from 'vue-search-select'
import botaoEditaSerie from '../botao/edita/serie'
import botaoCadastraSerie from '../botao/cadastra/serie'
import selectSeries from '../select/series'
import selectTurnos from '../select/turnos'
import selectTurmas from '../select/turmas'
import apiSerie from '../../../core/entidade/apiSerie'

export default {
    name: 'editarSerie',
    components: {
        botaoEditaSerie,
        botaoCadastraSerie,
        selectSeries,
        selectTurnos,
        selectTurmas,
        ModelListSelect
    },
    data() {
        return {
            series: []
        }
    },
    computed: {
        dados() {
            return this.$store.state.dados.serie.serie
        },
        acao() {
            return this.$store.state.dados.acao
        },
        editando() {
            return this.acao == 'edita'
        },
        cadastrando() {
            return this.acao == 'cadastra'
        },
        titulo() {
            if (this.editando) {
                return 'Atualizar as informações da série'
            } else if (this.cadastrando) {
                return 'Cadastrar uma série'
            }
        }
    },
    methods: {
        async buscaSeries(serie) {
			await apiSerie.buscaSeries({ serie }).then(response => {
				if(response.data.success) {
					this.series = response.data.data.series
                    if (this.series.length == 0) {
                        this.dados.cod_serie = null
                        this.dados.serie = serie
                    }
				} else {
					this.msgserie = response.data.error.message
				}
			})
		}
    }
}
</script>