<template>
    <div>
        <label for="atencoes">Atenção</label>
        <select class="form-control" name="atencoes" id="atencoes" v-model="filtro.cod_atencao">
            <option value=""></option>
            <option v-for="atencao in atencoes" :value="atencao.cod_atencao" :key="atencao.cod_atencao">{{atencao.atencao}}</option>
        </select>
        <msgSemResultado v-if="msg" :msg="msg" />
    </div>
</template>

<script>
import msgSemResultado from '../mensagem/semResultado'
import busca from '../../../core/functions/busca'

export default {
    name: 'selectAtencoes',
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
            atencoes: [],
            msg: null
        }
    },
    created() {
        busca.atencoes(this)
    }
}
</script>