<template>
	<templateBusca titulo="Inscrições">
		<div class="row">
			<div class="form-group col-6">
				<label for="nome">Nome</label>
				<input type="text" placeholder="Ex: João Silva" class="form-control" name="nome" v-model="filtro.nom_insc" />
			</div>
			<div class="form-group col-6">
				<selectSeries :filtro="filtro" />
			</div>
		</div>
		<div class="row">
			<div class="form-group col-6">
				<inputCpf :filtro="filtro"/>
			</div>
			<div class="form-group col-6">
				<selectTurnos :filtro="filtro" />
			</div>
		</div>
		<div class="row">
			<div class="col-8">
				<msg :tipo="msg.tipo" :msg="msg.msg" />
			</div>
			<div class="col-4 text-right">
				<botaoBuscaInscricao @msg="msg = $event" :filtro="filtro"/>
			</div>
		</div>
	</templateBusca>
</template>

<script>
import templateBusca from '../template/busca'
import inputCpf from '@form/inputCpf'
import selectSeries from '@select/series'
import selectTurnos from '@select/turnos'
import botaoBuscaInscricao from '@botao/busca/inscricao'
import msg from '@msg/msg'

export default {
	name: 'buscaInscricao',
	components: {
		templateBusca,
		inputCpf,
		selectSeries,
		selectTurnos,
		botaoBuscaInscricao,
		msg
	},
	data() {
		return {
			filtro: {},
			msg: {
				tipo: '',
				msg: ''
			}
		}
	}
}
</script>