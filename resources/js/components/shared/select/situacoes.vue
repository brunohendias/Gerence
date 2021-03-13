<template>
    <div>
        <label for="situacoes">Situação <inputRequire v-if="required"/></label>
        <select class="form-control" name="situacoes" id="situacoes" v-model="filtro.cod_situacao">
            <option value=""></option>
            <option v-for="situacao in situacoes" :value="situacao.cod_situacao" :key="situacao.cod_situacao">{{situacao.situacao}}</option>
        </select>
        <msg v-if="msg" :msg="msg" tipo="notfound"/>
    </div>
</template>

<script>
import { situacoes } from '@functions/busca'
import inputRequire from '@form/inputRequire'
import msg from '@msg/msg'

export default {
    name: 'selectSituacoes',
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
            situacoes: [],
            msg: null
        }
    },
    created() {
        situacoes(this)
    }
}
</script>