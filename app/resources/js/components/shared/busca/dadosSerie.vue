<template>
    <templateBusca titulo="Busque as séries">
        <div class="row">
            <div class="col-md-4">
                <selectSeries :filtro="filtro" />
            </div>
             <div class="col-md-4">
                <selectTurnos :filtro="filtro" />
            </div>
            <div class="col-md-4">
                <selectTurmas :filtro="filtro" />
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-8">
                <msg :tipo="msg.tipo" :msg="msg.msg" />
            </div>
            <div class="col-4 text-right">
                <span @click="trocaAcao('cadastra')">
                    <router-link class="btn btn-primary" to="/cadastraserie">
                        Cadastrar
                    </router-link>
                </span>
                <botaoBuscaSerie @msg="msg = $event" :filtro="filtro"/>
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