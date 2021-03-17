<template>
    <div>
        <label for="turmas">Turma <inputRequire v-if="required"/></label>
        <select class="form-control" name="turmas" id="turmas" v-model="filtro.cod_turma">
            <option value=""></option>
            <option v-for="turma in turmas" :value="turma.cod_turma" :key="turma.cod_turma">{{turma.turma}}</option>
        </select>
        <msg v-if="msg" :msg="msg" tipo="notfound"/>
    </div>
</template>

<script>
import { turmas } from '@functions/busca'
import inputRequire from '@form/inputRequire'
import msg from '@msg/msg'

export default {
    name: 'selectTurmas',
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
            turmas: [],
            msg: null
        }
    },
    created() {
        turmas(this)
    }
}
</script>