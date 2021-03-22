<template>
	<templateBusca titulo="Busque os alunos">
		<div class="row">
			<div class="form-group col-6">
				<inputNome :filtro="filtro"/>
			</div>
			<div class="form-group col-3">
				<selectSeries :filtro="filtro" />
			</div>
			<div class="form-group col-3">
				<selectTurnos :filtro="filtro" />
			</div>
		</div>
		<div class="row">
			<div class="form-group col-6">
				<inputCpf :filtro="filtro"/>
			</div>
			<div class="form-group col-3">
				<selectTurmas :filtro="filtro" />
			</div>
			<div class="form-group col-3">
				<selectAtencoes :filtro="filtro" />
			</div>
		</div>
		<div class="row">
			<div class="form-group col-6">
				<selectProfessores :filtro="filtro"/>
			</div>
			<div class="form-group col-3">
				<selectSituacoes :filtro="filtro" />
			</div>
		</div>
		<div class="row">
			<div class="col-8">
				<msg :tipo="msg.tipo" :msg="msg.msg" />
			</div>
			<div class="col-4 text-right">
				<botaoBuscaAluno @msg="msg = $event" :filtro="filtro"/>
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
import selectSituacoes from '@select/situacoes'
import botaoBuscaAluno from '@botao/busca/aluno'
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
		selectSituacoes,
		botaoBuscaAluno,
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