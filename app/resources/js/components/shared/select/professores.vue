<template>
    <ISelect title="Professor" label="nom_prof" 
        value="cod_prof" :required="required" 
        pathname="professores" />
</template>

<script>
import ISelect from '@template/select'

export default {
    name: 'selectProfessor',
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