<template>
    <ISelect title="Situação" label="situacao" 
        value="cod_situacao" :required="required" 
        pathname="situacoes" />
</template>

<script>
import ISelect from '@template/select'

export default {
    name: 'selectSituacoes',
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