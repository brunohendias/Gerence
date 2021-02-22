<template>
    <div>
        <label for="situacoes">Situação</label>
        <select class="form-control" name="situacoes" id="situacoes" v-model="filtro.cod_situacao">
            <option value=""></option>
            <option v-for="situacao in situacoes" :value="situacao.cod_situacao" :key="situacao.cod_situacao">{{situacao.situacao}}</option>
        </select>
        <msgSemResultado v-if="msg" :msg="msg" />
    </div>
</template>

<script>
import msgSemResultado from '@msg/semResultado'
import busca from '@functions/busca'

export default {
    name: 'selectSituacoes',
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
            situacoes: [],
            msg: null
        }
    },
    created() {
        busca.situacoes(this)
    }
}
</script>