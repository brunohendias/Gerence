<template>
    <templateBusca :classTitulo="classTitulo" titulo="Busque as séries">
        <div class="col-md-4">
            <selectSeries :filtro="filtro" />
        </div>
        <div class="col-md-3">
            <selectTurnos :filtro="filtro" />
        </div>
        <div class="col-md-3">
            <selectTurmas :filtro="filtro" />
        </div>
        <div class="col-md-12 mt-3">
            <botaoBuscaSerie :filtro="filtro"/>
        </div>
    </templateBusca>
</template>

<script>
import templateBusca from './templateBusca'
import selectSeries from '../select/series'
import selectTurnos from '../select/turnos'
import selectTurmas from '../select/turmas'
import botaoBuscaSerie from '../botao/busca/serie'

export default {
    name: 'buscaDadosSerie',
    components: {
        templateBusca,
        selectSeries,
        selectTurnos,
        selectTurmas,
        botaoBuscaSerie
    },
    data() {
        return {
            filtro: {}
        }
    },
    props: {
		classTitulo: {
			type: String
		}
	}
}
</script>