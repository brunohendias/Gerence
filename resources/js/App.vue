<template>
	<div class="container">
		<sidebar-menu :menu="menu" width="250px" :collapsed="true"/>
		<keep-alive>
			<router-view></router-view>
		</keep-alive>
	</div>
</template>

<script>

export default {
	name: 'App',
	created() {
		this.geraMenu()
	},
	data() {
		return {
			menu: [{header: true, title: 'Menu', hiddenOnCollapse: true, name: 'header'}]
		}
	},
	methods: {
		geraMenu() {
			this.$router.options.routes.map(rota => {
				let item = this.menu.find(itemMenu => itemMenu.title == rota.parentMenu)
				if (item) {// se encontrar o registro e porque e rota secundaria
					item.child.push({
						href: rota.path,
						title: rota.name,
						icon: rota.icon
					})
				} else {
					if (rota.icon) {
						this.menu.push({
							href: rota.path,
							title: rota.name,
							icon: rota.icon,
							child: []
						})
					}
				}
			})
		}
	}
}
</script>

<style>
	body {
		height: 100%;
		background-color: #ccc;
	}
	.bordas {
		border-radius: 10px;
	}
</style>