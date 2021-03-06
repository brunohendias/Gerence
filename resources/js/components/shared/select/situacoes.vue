<template>
    <div>
        <label for="situacoes">Situação</label>
        <select class="form-control" name="situacoes" id="situacoes" v-model="filtro.cod_situacao">
            <option value=""></option>
            <option v-for="situacao in situacoes" :value="situacao.cod_situacao" :key="situacao.cod_situacao">{{situacao.situacao}}</option>
        </select>
        <msg v-if="msg" :msg="msg" tipo="notfound"/>
    </div>
</template>

<script>
import busca from '@functions/busca'
import msg from '@msg/msg'

export default {
    name: 'selectSituacoes',
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
            situacoes: [],
            msg: null
        }
    },
    created() {
        busca.situacoes(this)
    }
}
</script>