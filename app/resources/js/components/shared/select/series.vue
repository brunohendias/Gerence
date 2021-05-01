<template>
    <ISelect title="Séries" label="serie" 
        value="cod_serie" :required="required" 
        pathname="series" />
</template>

<script>
import ISelect from '@template/select'

export default {
    name: 'selectSeries',
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