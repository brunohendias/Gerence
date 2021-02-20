<template>
	<div class="bg-white mb-4 borda-top" :style="classTitulo">
		<div class="borda-top" :style="classTitulo">
			<div class="row ml-4 pt-3 pb-1">
				<h5 class="text-white">{{titulo}}</h5>
			</div>
		</div>
		<form>
			<div class="row p-4">
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
		},
		classTitulo: {
			Type: String,
			default: 'backgroundColor: black;'
		},
	}
}
</script>

<style scoped>
	.borda-top {
		border-radius: 10px 10px 0px 0px;
	}
</style>