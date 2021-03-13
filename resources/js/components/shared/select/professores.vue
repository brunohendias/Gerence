<template>
    <div>
        <label for="professores">Professor <inputRequire v-if="required"/></label>
        <select class="form-control" name="professores" id="professores" v-model="filtro.cod_prof">
            <option value=""></option>
            <option v-for="professor in professores" :value="professor.cod_prof" :key="professor.cod_prof">{{professor.nom_prof}}</option>
        </select>
        <msg v-if="msg" :msg="msg" tipo="notfound"/>
    </div>
</template>

<script>
import { professores } from '@functions/busca'
import inputRequire from '@form/inputRequire'
import msg from '@msg/msg'

export default {
    name: 'selectAtencoes',
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
            professores: [],
            msg: null
        }
    },
    created() {
        professores(this)
    }
}
</script>