<template>
	<sliding-pagination :current="pagina_atual" :total="total_pagina" @page-change="pageChangeHandler"></sliding-pagination>
</template>

<script>
import SlidingPagination from 'vue-sliding-pagination'

export default {
	name: 'paginacao',
	components: {
		SlidingPagination
	},
	data() {
		return {
			pagina_atual: 0
		}
	},
	props: {
		total_pagina: {
			type: Number,
			required: true
		},
		action: {
			type: String,
			required: true
		}
	},
	methods: {
		pageChangeHandler(pagina) {
			this.pagina_atual = pagina
			this.$store.dispatch(this.action, pagina)
		}
	}
}
</script>