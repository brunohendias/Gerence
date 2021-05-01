<template>
    <templateBusca titulo="Séries">
        <div class="row">
            <div class="col-md-4">
                <selectSeries />
            </div>
             <div class="col-md-4">
                <selectTurnos />
            </div>
            <div class="col-md-4">
                <selectTurmas />
            </div>
        </div>
        <botaoBuscaSerie />
    </templateBusca>
</template>

<script>
import templateBusca from '../template/busca'
import selectSeries from '@select/series'
import selectTurnos from '@select/turnos'
import selectTurmas from '@select/turmas'
import botaoBuscaSerie from '@botao/busca/serie'

export default {
    name: 'buscaDadosSerie',
    components: {
        templateBusca,
        selectSeries,
        selectTurnos,
        selectTurmas,
        botaoBuscaSerie
    }
}
</script>