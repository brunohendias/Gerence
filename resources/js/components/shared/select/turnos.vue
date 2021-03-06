<template>
    <div>
        <label for="turnos">Turno</label>
        <select class="form-control" name="turnos" id="turnos" v-model="filtro.cod_turno">
            <option value=""></option>
            <option v-for="turno in turnos" :value="turno.cod_turno" :key="turno.cod_turno">{{turno.turno}}</option>
        </select>
        <msg v-if="msg" :msg="msg" tipo="notfound"/>
    </div>
</template>

<script>
import busca from '@functions/busca'
import msg from '@msg/msg'

export default {
    name: 'selectTurnos',
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
            turnos: [],
            msg: null
        }
    },
    created() {
        busca.turnos(this)
    }
}
</script>