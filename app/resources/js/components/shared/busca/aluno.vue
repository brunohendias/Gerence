<template>
	<templateBusca titulo="Alunos">
		<div class="row">
			<div class="form-group col-6">
				<inputNomeAluno />
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
			<div class="form-group col-3">
				<selectSituacoes />
			</div>
		</div>
		<botaoBuscaAluno />
	</templateBusca>
</template>

<script>
import templateBusca from '../template/busca'
import inputNomeAluno from '@form/input/nomeAluno'
import inputCpf from '@form/input/cpf'
import selectProfessores from '@select/professores'
import selectSeries from '@select/series'
import selectTurnos from '@select/turnos'
import selectTurmas from '@select/turmas'
import selectAtencoes from '@select/atencoes'
import selectSituacoes from '@select/situacoes'
import botaoBuscaAluno from '@botao/busca/aluno'

export default {
	name: 'buscaCandidato',
	components: {
		templateBusca,
		inputNomeAluno,
		inputCpf,
		selectProfessores,
		selectSeries,
		selectTurnos,
		selectTurmas,
		selectAtencoes,
		selectSituacoes,
		botaoBuscaAluno
	}
}
</script>