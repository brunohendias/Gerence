<template>
    <div>
        <label for="atencoes">Atenção</label>
        <select class="form-control" name="atencoes" id="atencoes" v-model="filtro.cod_atencao">
            <option value=""></option>
            <option v-for="atencao in atencoes" :value="atencao.cod_atencao" :key="atencao.cod_atencao">{{atencao.atencao}}</option>
        </select>
        <msg v-if="msg" :msg="msg" tipo="notfound"/>
    </div>
</template>

<script>
import busca from '@functions/busca'
import msg from '@msg/msg'

export default {
    name: 'selectAtencoes',
    components: {
        msg
    },
    props: {
        filtro: {
            type: Object,
            default: {}
        }
    },
    data() {
        return {
            atencoes: [],
            msg: null
        }
    },
    created() {
        busca.atencoes(this)
    }
}
</script>