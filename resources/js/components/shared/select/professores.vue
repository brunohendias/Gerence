<template>
    <div>
        <label for="professores">Professor</label>
        <select class="form-control" name="professores" id="professores" v-model="filtro.cod_prof">
            <option value=""></option>
            <option v-for="professor in professores" :value="professor.cod_prof" :key="professor.cod_prof">{{professor.nom_prof}}</option>
        </select>
        <msg v-if="msg" :msg="msg" tipo="notfound"/>
    </div>
</template>

<script>
import busca from '@functions/busca'
import msg from '@msg/msg'

export default {
    name: 'selectAtencoes',
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
            professores: [],
            msg: null
        }
    },
    created() {
        busca.professores(this)
    }
}
</script>