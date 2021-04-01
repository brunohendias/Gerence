<template>
    <div>
        <span v-if="processando" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        <span v-else><slot></slot></span>
    </div>
</template>

<script>
export default {
    name: 'load',
    computed: {
		processando() {
			return this.$store.state.status.processando
		}
	}
}
</script>