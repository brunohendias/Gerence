<template>
    <div>
        <label for="turmas">Turma</label>
        <select class="form-control" name="turmas" id="turmas" v-model="filtro.cod_turma">
            <option value=""></option>
            <option v-for="turma in turmas" :value="turma.cod_turma" :key="turma.cod_turma">{{turma.turma}}</option>
        </select>
        <msg v-if="msg" :msg="msg" tipo="notfound"/>
    </div>
</template>

<script>
import busca from '@functions/busca'
import msg from '@msg/msg'

export default {
    name: 'selectTurmas',
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
            turmas: [],
            msg: null
        }
    },
    created() {
        busca.turmas(this)
    }
}
</script>