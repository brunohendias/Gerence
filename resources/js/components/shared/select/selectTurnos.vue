<template>
    <div>
        <label for="codturno">Turno</label>
        <select class="form-control" name="turnos" id="turnos" v-model="filtro.codturno">
            <option value=""></option>
            <option v-for="turno in turnos" :value="turno.codturno" :key="turno.codturno">{{turno.turno}}</option>
        </select>
        <msgSemResultado v-if="msgturno" :msg="msgturno" />
    </div>
</template>

<script>
import msgSemResultado from '../mensagem/semResultado'
import apiTurno from '../../../core/entidade/apiTurno'

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
            msgturno: null
        }
    },
    created() {
        this.buscaTurnos()
    },
    methods: {
        async buscaTurnos() {
			await apiTurno.buscaTurnos().then(response => {
				if(response.data.success) {
					this.turnos = response.data.data.turnos
				} else {
					this.msgturno = response.data.error.message
				}
			})
		}
    }
}
</script>