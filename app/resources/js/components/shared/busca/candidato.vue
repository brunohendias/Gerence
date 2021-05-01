<template>
	<templateBusca titulo="Candidatos">
		<div class="row">
			<div class="form-group col-6">
				<inputNomeCandidato />
			</div>
			<div class="form-group col-3">
				<selectSeries />
			</div>
			<div class="form-group col-3">
				<selectTurnos />
			</div>
		</div>
		<div class="row">
			<div class="form-group col-6">
				<inputCpf />
			</div>
			<div class="form-group col-3">
				<selectTurmas />
			</div>
			<div class="form-group col-3">
				<selectAtencoes />
			</div>
		</div>
		<div class="row">
			<div class="form-group col-6">
				<selectProfessores />
			</div>
		</div>
		<botaoBuscaCandidato />
	</templateBusca>
</template>

<script>
import templateBusca from '../template/busca'
import inputNomeCandidato from '@form/input/nomeCandidato'
import inputCpf from '@form/input/cpf'
import selectProfessores from '@select/professores'
import selectSeries from '@select/series'
import selectTurnos from '@select/turnos'
import selectTurmas from '@select/turmas'
import selectAtencoes from '@select/atencoes'
import botaoBuscaCandidato from '@botao/busca/candidato'

export default {
	name: 'buscaCandidato',
	components: {
		templateBusca,
		inputNomeCandidato,
		inputCpf,
		selectProfessores,
		selectSeries,
		selectTurnos,
		selectTurmas,
		selectAtencoes,
		botaoBuscaCandidato
	}
}
</script>