<template>
	<templateBusca titulo="Inscrições">
		<div class="row">
			<div class="form-group col-6">
				<inputNomeInscricao />
			</div>
			<div class="form-group col-6">
				<selectSeries />
			</div>
		</div>
		<div class="row">
			<div class="form-group col-6">
				<inputCpf />
			</div>
			<div class="form-group col-6">
				<selectTurnos />
			</div>
		</div>
		<botaoBuscaInscricao />
	</templateBusca>
</template>

<script>
import templateBusca from '../template/busca'
import inputNomeInscricao from '@form/input/nomeInscricao'
import inputCpf from '@form/inputCpf'
import selectSeries from '@select/series'
import selectTurnos from '@select/turnos'
import botaoBuscaInscricao from '@botao/busca/inscricao'

export default {
	name: 'buscaInscricao',
	components: {
		templateBusca,
		inputNomeInscricao,
		inputCpf,
		selectSeries,
		selectTurnos,
		botaoBuscaInscricao
	}
}
</script>