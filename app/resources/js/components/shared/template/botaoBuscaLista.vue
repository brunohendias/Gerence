<template>
	<div class="row">
		<div class="col-8">
			<msg :tipo="tipo" :msg="msg" />
		</div>
		<div class="col-4 text-right">
			<button class="btn btn-dark" @click.stop.prevent="buscar">
				<load> <span>Buscar</span> </load>
			</button>
		</div>
	</div>
</template>

<script>
import { lista } from '@functions/busca'
import load from './load'

export default {
	name: 'botaoBuscaLista',
	components: {
		load
	},
	props: {
        pathname: {
            type: String,
            required: true
        },
        action: {
            type: String,
            required: true
        }
	},
	data() {
		return {
			msg: null,
			tipo: null
		}
	},
	computed: {
        filtro() {
            return this.$store.state.generic.filtro
        }
    },
	methods: {
		buscar() {
			lista(this)
			this.$store.dispatch('alteraFiltro', {})
		}
	}
}
</script>