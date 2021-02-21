<template>
    <div>
        <label for="turmas">Turma</label>
        <select class="form-control" name="turmas" id="turmas" v-model="filtro.cod_turma">
            <option value=""></option>
            <option v-for="turma in turmas" :value="turma.cod_turma" :key="turma.cod_turma">{{turma.turma}}</option>
        </select>
        <msgSemResultado v-if="msg" :msg="msg" />
    </div>
</template>

<script>
import msgSemResultado from '../mensagem/semResultado'
import busca from '../../../core/functions/busca'

export default {
    name: 'selectTurmas',
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
            turmas: [],
            msg: null
        }
    },
    created() {
        busca.turmas(this)
    }
}
</script>