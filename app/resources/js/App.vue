<template>
	<div id="app">
		<sidebar-menu :menu="menu" width="250px" :collapsed="true"/>
		<navbar />
		<div class="container">
			<keep-alive>
				<router-view></router-view>
			</keep-alive>
		</div>
	</div>
</template>

<script>
import navbar from './components/shared/navbar'

export default {
	name: 'App',
	components: {
		navbar
	},
	data() {
		return {
			menu: [{header: true, title: 'Menu', hiddenOnCollapse: true, name: 'header'}]
		}
	},
	created() {
		this.geraMenu()
	},
	methods: {
		geraMenu() {
			let rotas = this.$router.options.routes
			rotas.forEach(rota => {
				if (rota.id) {
					this.menu.push({
						id: rota.id,
						href: rota.path,
						title: rota.name,
						icon: rota.icon,
						child: []
					})
				} else if (rota.pai) {
					let pai = this.menu.find(item => item.id == rota.pai)
					pai.child.push({
						href: rota.path,
						title: rota.name,
						icon: rota.icon
					})
				}
			});
		}
	}
}
</script>

<style>
	body {
		background-color: #ccc;
	}
	.bordas {
		border-radius: 10px;
	}
	.v-sidebar-menu .vsm--link_level-1 .vsm--icon {
		width: 20px !important;
		height: 20px !important;
		margin-left: 5px;
	}
</style>