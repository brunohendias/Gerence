<template>
	<div class="bg-white mb-4 borda-top" :class="'headerpanel-'+pathname">
		<div class="borda-top" :class="'headerpanel-'+pathname">
			<div class="row ml-4 pt-2 text-white">
				<h5>{{titulo}}</h5>
			</div>
		</div>
		<form>
			<div class="p-4">
				<slot></slot>
			</div>
		</form>
	</div>
</template>

<script>
export default {
	name: 'templateBusca',
	props: {
		titulo: {
			type: String,
			required: true
		}
	},
	computed: {
		pathname() {
			return window.location.pathname.split('/').reverse()[0]
		}
	}
}
</script>