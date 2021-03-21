<template>
	<templateBusca titulo="Busque os candidatos">
		<div class="col-sm-6">
			<div class="form-group">
				<inputNome :filtro="filtro"/>
			</div>
			<div class="form-group">
				<inputCpf :filtro="filtro"/>
			</div>
			<div class="form-group">
				<selectProfessores :filtro="filtro"/>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<selectSeries :filtro="filtro" />
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<selectTurnos :filtro="filtro" />
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<selectTurmas :filtro="filtro" />
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<selectAtencoes :filtro="filtro" />
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="row">
				<div class="col-md-2 pt-1">
					<botaoBuscaCandidato @msg="msg = $event" :filtro="filtro"/>
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
import inputNome from '@form/inputNome'
import inputCpf from '@form/inputCpf'
import selectProfessores from '@select/professores'
import selectSeries from '@select/series'
import selectTurnos from '@select/turnos'
import selectTurmas from '@select/turmas'
import selectAtencoes from '@select/atencoes'
import botaoBuscaCandidato from '@botao/busca/candidato'
import msg from '@msg/msg'

export default {
	name: 'buscaCandidato',
	components: {
		templateBusca,
		inputNome,
		inputCpf,
		selectProfessores,
		selectSeries,
		selectTurnos,
		selectTurmas,
		selectAtencoes,
		botaoBuscaCandidato,
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