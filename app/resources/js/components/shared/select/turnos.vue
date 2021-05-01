<template>
    <ISelect title="Turno" label="turno" 
        value="cod_turno" :required="required" 
        pathname="turnos" />
</template>

<script>
import ISelect from '@template/select'

export default {
    name: 'selectTurnos',
    components: {
        ISelect
    },
    props: {
        required: {
            type: Boolean,
            default: false
        }
    }
}
</script>