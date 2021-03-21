<template>
    <div>
        <label for="turnos">Turno <inputRequire v-if="required"/></label>
        <select class="form-control" name="turnos" id="turnos" v-model="filtro.cod_turno">
            <option value=""></option>
            <option v-for="turno in turnos" :value="turno.cod_turno" :key="turno.cod_turno">{{turno.turno}}</option>
        </select>
        <msg v-if="msg" :msg="msg" tipo="notfound"/>
    </div>
</template>

<script>
import { turnos } from '@functions/busca'
import inputRequire from '@form/inputRequire'
import msg from '@msg/msg'

export default {
    name: 'selectTurnos',
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
            turnos: [],
            msg: null
        }
    },
    created() {
        turnos(this)
    }
}
</script>