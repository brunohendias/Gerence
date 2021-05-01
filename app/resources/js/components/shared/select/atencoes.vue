<template>
    <ISelect title="Atenção" label="atencao" 
        value="cod_atencao" :required="required" 
        pathname="atencoes" />
</template>

<script>
import ISelect from '@template/select'

export default {
    name: 'selectAtencoes',
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