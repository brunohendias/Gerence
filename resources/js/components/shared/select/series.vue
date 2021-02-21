<template>
    <div>
        <label for="series">Série</label>
        <select class="form-control" name="series" id="series" v-model="filtro.cod_serie" :disabled="disabled">
            <option value=""></option>
            <option v-for="serie in series" :value="serie.cod_serie" :key="serie.cod_serie">{{serie.serie}}</option>
        </select>
        <msgSemResultado v-if="msg" :msg="msg" />
    </div>
</template>

<script>
import msgSemResultado from '../mensagem/semResultado'
import busca from '../../../core/functions/busca'

export default {
    name: 'selectSeries',
    components: {
        msgSemResultado
    },
    props: {
        filtro: {
            type: Object,
            default: {}
        },
        disabled: {
            type: Boolean,
            default: false
        }
    },
    data() {
        return {
            series: [],
            msg: null
        }
    },
    created() {
        busca.series(this)
    }
}
</script>