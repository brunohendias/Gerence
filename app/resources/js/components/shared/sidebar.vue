<template>
    <sidebar-menu :menu="menu" width="250px" :collapsed="true" @item-click="onItemClick"/>
</template>

<script>
import { relatorios } from '@functions/busca'

export default {
    name: 'sidebar',
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
						icon: rota.icon,
                        api: rota.api
					})
				}
			});
		},
        onItemClick(event, item, node) {
            if (item.relatorio) relatorios(item.relatorio.url)
        }
	}}
</script>