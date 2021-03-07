<template>
    <div>
        <label for="atencoes">Atenção <inputRequire v-if="required"/></label>
        <select class="form-control" name="atencoes" id="atencoes" v-model="filtro.cod_atencao">
            <option value=""></option>
            <option v-for="atencao in atencoes" :value="atencao.cod_atencao" :key="atencao.cod_atencao">{{atencao.atencao}}</option>
        </select>
        <msg v-if="msg" :msg="msg" tipo="notfound"/>
    </div>
</template>

<script>
import { atencoes } from '@functions/busca'
import inputRequire from '@form/inputRequire'
import msg from '@msg/msg'

export default {
    name: 'selectAtencoes',
    components: {
        msg,
        inputRequire
    },
    props: {
        required: {
            type: Boolean,
            default: false
        },
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
        atencoes(this)
    }
}
</script>