<template>
    <ISelect title="Turma" label="turma" 
        value="cod_turma" :required="required" 
        pathname="turmas" />
</template>

<script>
import ISelect from '@template/select'

export default {
    name: 'selectTurmas',
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