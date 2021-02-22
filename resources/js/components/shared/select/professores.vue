<template>
    <div>
        <label for="professores">Professor</label>
        <select class="form-control" name="professores" id="professores" v-model="filtro.cod_prof">
            <option value=""></option>
            <option v-for="professor in professores" :value="professor.cod_prof" :key="professor.cod_prof">{{professor.nom_prof}}</option>
        </select>
        <msgSemResultado v-if="msg" :msg="msg" />
    </div>
</template>

<script>
import msgSemResultado from '@msg/semResultado'
import busca from '@functions/busca'

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
            professores: [],
            msg: null
        }
    },
    created() {
        busca.professores(this)
    }
}
</script>