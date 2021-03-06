<template>
    <div>
        <label for="series">Série</label>
        <select class="form-control" name="series" id="series" v-model="filtro.cod_serie" :disabled="disabled">
            <option value=""></option>
            <option v-for="serie in series" :value="serie.cod_serie" :key="serie.cod_serie">{{serie.serie}}</option>
        </select>
        <msg v-if="msg" :msg="msg" tipo="notfound"/>
    </div>
</template>

<script>
import busca from '@functions/busca'
import msg from '@msg/msg'

export default {
    name: 'selectSeries',
    components: {
        msg
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