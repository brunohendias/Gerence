<template>
	<div id="app" v-if="start">
		<sidebar />
		<div class="container">
			<keep-alive>
				<router-view></router-view>
			</keep-alive>
		</div>
	</div>
</template>

<script>
import { user } from '@functions/busca'
import sidebar from './components/shared/sidebar'

export default {
	name: 'App',
	components: { sidebar },
	data() {
		return {
			start: false
		}
	},
	created() {
		this.preLoad()
	},
	methods: {
		preLoad() {
			user(this, this.start)
			console.clear()
		}
	}
}
</script>