<template>
	<templateBusca titulo="Busque as inscrições">
		<div class="col-sm-6">
			<div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" placeholder="Ex: João Silva" class="form-control" name="nome" v-model="filtro.nom_insc" />
			</div>
			<div class="form-group">
				<inputCpf :filtro="filtro"/>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<selectSeries :filtro="filtro" />
			</div>
			<div class="form-group">
				<selectTurnos :filtro="filtro" />
			</div>
		</div>
		<div class="col-sm-12">
			<div class="row">
				<div class="col-md-2 pt-1">
					<botaoBuscaInscricao @msg="msg = $event" :filtro="filtro"/>
				</div>
				<div class="col-md-10">
					<msg :tipo="msg.tipo" :msg="msg.msg" />
				</div>
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