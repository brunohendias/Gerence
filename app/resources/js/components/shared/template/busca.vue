<template>
	<div class="bg-white mb-4 borda-top">
		<div class="borda-top">
			<div class="text-center">
				<h4 class="pt-2">{{titulo}}</h4>
			</div>
			<hr>
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