<template>
    <templateBusca :classTitulo="classTitulo" titulo="Busque as séries">
        <div class="col-md-4">
            <selectSeries :filtro="filtro" />
        </div>
        <div class="col-md-4">
            <selectTurnos class="float-right w-100" :filtro="filtro" />
        </div>
        <div class="col-md-4">
            <selectTurmas class="float-right w-100" :filtro="filtro" />
        </div>
        <div class="col-md-12 pt-4">
            <div class="row">
                <div class="col-sm-3">
                    <botaoBuscaSerie @msg="msg = $event" :filtro="filtro"/>
                    <span @click="trocaAcao('cadastra')">
                        <router-link class="btn btn-primary ml-3" to="/cadastraserie">
                            Cadastrar
                        </router-link>
                    </span>
                </div>
                <div class="col-md-9">
					<msg :tipo="msg.tipo" :msg="msg.msg" />
                </div>
            </div>
        </div>
    </templateBusca>
</template>

<script>
import templateBusca from '../template/busca'
import selectSeries from '@select/series'
import selectTurnos from '@select/turnos'
import selectTurmas from '@select/turmas'
import botaoBuscaSerie from '@botao/busca/serie'
import msg from '@msg/msg'

export default {
    name: 'buscaDadosSerie',
    components: {
        templateBusca,
        selectSeries,
        selectTurnos,
        selectTurmas,
        botaoBuscaSerie,
        msg
    },
    props: {
		classTitulo: {
			type: String
		}
	},
    data() {
        return {
            filtro: {},
            msg: {
				tipo: '',
				msg: ''
			}
        }
    },
    methods: {
        trocaAcao(acao) {
            this.$store.dispatch('carregaSerie', { serie: {}, turno: {}, turma: {} })
            this.$store.dispatch('alteraAcao', acao)
        }
    }
}
</script>