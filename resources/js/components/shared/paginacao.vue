<template>
	<sliding-pagination :current="current" :total="totalPaginas" @page-change="pageChangeHandler"></sliding-pagination>
</template>

<script>
import 'vue-sliding-pagination/dist/style/vue-sliding-pagination.css'
import SlidingPagination from 'vue-sliding-pagination'

export default {
	name: 'paginacao',
	components: {
		SlidingPagination
	},
	props: {
		totalPaginas: {
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
		totalPaginas() {
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