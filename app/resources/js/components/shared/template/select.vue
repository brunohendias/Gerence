<template>
    <div>
        <label :for="label">{{ title }} <inputRequire v-if="required"/></label>
        <select class="form-control" :name="label" :id="label" v-model="filtro[value]" :disabled="disabled">
            <option value=""></option>
            <option v-for="dado in dados" :value="dado[value]" :key="dado[value]">{{ dado[label] }}</option>
        </select>
        <IMsg v-if="msg" :msg="msg" :tipo="tipo"/>
    </div>
</template>

<script>
import { get } from '@functions/busca'
import inputRequire from '@form/inputRequire'
import IMsg from '@msg/msg'

export default {
    name: 'Iselect',
    components: {
        IMsg,
        inputRequire
    },
    props: {
        title: {
            type: String,
            default: ''
        },
        value: {
            type: String,
            required: true
        },
        label: {
            type: String,
            required: true
        },
        required: {
            type: Boolean,
            default: false
        },
        disabled: {
            type: Boolean,
            default: false
        },
        pathname: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            dados: [],
            msg: null,
            tipo: null
        }
    },
    computed: {
        filtro() {
            return this.$store.state.generic.filtro
        }
    },
    created() {
        get(this)
    }
}
</script>