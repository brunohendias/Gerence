<template>
    <div>
        <label for="turnos">Turno</label>
        <select class="form-control" name="turnos" id="turnos" v-model="filtro.cod_turno">
            <option value=""></option>
            <option v-for="turno in turnos" :value="turno.cod_turno" :key="turno.cod_turno">{{turno.turno}}</option>
        </select>
        <msgSemResultado v-if="msg" :msg="msg" />
    </div>
</template>

<script>
import msgSemResultado from '@msg/semResultado'
import busca from '@functions/busca'

export default {
    name: 'selectTurnos',
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
            turnos: [],
            msg: null
        }
    },
    created() {
        busca.turnos(this)
    }
}
</script>