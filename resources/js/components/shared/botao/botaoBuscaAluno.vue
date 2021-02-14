<template>
	<button class="btn btn-dark" @click.stop.prevent="buscarAlunos" :disabled="buscando">
		<i v-if="buscando" class="spinner-border spinner-border-sm"></i>
		<span v-else>Buscar</span>
	</button>
</template>

<script>
import apiAluno from '../../../core/entidade/apiAluno'

export default {
	props: {
		filtro: {
			type: Object,
			default: {}
		}
	},
	data() {
		return {
			buscando: false
		}
	},
	methods: {
		async buscarAlunos() {
			this.buscando = true
			this.$emit('msgSuccess', null)
			this.$emit('msgError', null)
			await apiAluno.listarAlunos(this.filtro).then(response => {
				this.buscando = false
				let alunos = []
				if(response.data.success) {
					alunos = response.data.data.alunos
					this.mostraMensagem({tipo: 'sucesso', msg: response.data.data.msg})
				} else {
					this.mostraMensagem({tipo: 'alerta', msg: response.data.error.message})
				}
				this.$store.dispatch('carregaAlunos', alunos)
			}).catch(e => {
				this.mostraMensagem({tipo: 'erro', msg: e})
			})
		},
		mostraMensagem(mensagem) {
			this.$emit('msg', mensagem)
		}
	}
}
</script>