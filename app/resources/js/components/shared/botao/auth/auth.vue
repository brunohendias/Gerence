<template>
    <button type="submit" class="btn btn-primary">
        <load>
            <span>{{ title }}</span>
        </load>
    </button>
</template>

<script>
import load from '@shared/load'

export default {
    name: 'botaoAuth',
    components: { load },
    props: {
        title: {
            type: String,
            required: true
        }
    }
}
</script>