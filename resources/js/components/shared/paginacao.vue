<template>
	<sliding-pagination :current="current" :total="total" @page-change="pageChangeHandler"></sliding-pagination>
</template>

<script>
import SlidingPagination from 'vue-sliding-pagination'

export default {
	name: 'paginacao',
	components: {
		SlidingPagination
	},
	props: {
		total: {
			type: Number,
			required: true
		}
	},
	data() {
		return {
			current: 1
		}
	},
	watch: {
		total() {
			this.pageChangeHandler(1)
		}
	},
	methods: {
		pageChangeHandler(current) {
			this.current = current
			this.$emit('alteraPagina', this.current - 1)
		}
	}
}
</script>