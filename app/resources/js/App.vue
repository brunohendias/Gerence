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

export default {
	name: 'App',
	components: { sidebar }
}
</script>