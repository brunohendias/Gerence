<template>
	<div id="app">
		<sidebar />
		<div class="container">
			<keep-alive>
				<router-view></router-view>
			</keep-alive>
		</div>
	</div>
</template>

<script>
import sidebar from './components/shared/sidebar'
import { user } from '@functions/busca'

export default {
	name: 'App',
	components: { sidebar },
	created() {
		user()
	}
}
</script>