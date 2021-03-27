<template>
	<div id="app">
		<sidebar />
		<navbar />
		<div class="container">
			<keep-alive>
				<router-view></router-view>
			</keep-alive>
		</div>
	</div>
</template>

<script>
import sidebar from './components/shared/sidebar'
import navbar from './components/shared/navbar'

export default {
	name: 'App',
	components: {
		sidebar,
		navbar
	}
}
</script>