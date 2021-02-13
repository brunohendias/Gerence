<template>
    <div>
        <label for="codserie">Serie</label>
        <select class="form-control" name="series" id="series" v-model="filtro.codserie">
            <option value=""></option>
            <option v-for="serie in series" :value="serie.codserie" :key="serie.codserie">{{serie.serie}}</option>
        </select>
        <msgSemResultado v-if="msgserie" :msg="msgserie" />
    </div>
</template>

<script>
import msgSemResultado from '../mensagem/semResultado'
import apiSerie from '../../../core/entidade/apiSerie'

export default {
    name: 'selectSeries',
    components: {
        msgSemResultado
    },
    props: {
        filtro: {
            type: Object,
            default: {}
        }
    },
    data() {
        return {
            series: [],
            msgserie: null
        }
    },
    created() {
        this.buscaSeries()
    },
    methods: {
        async buscaSeries() {
			await apiSerie.buscaSeries().then(response => {
				if(response.data.success) {
					this.series = response.data.data.series
				} else {
					this.msgserie = response.data.error.message
				}
			})
		}
    }
}
</script>