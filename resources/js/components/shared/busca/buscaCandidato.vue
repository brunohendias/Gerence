<template>
	<templateBusca :classTitulo="classTitulo" titulo="Busque os candidatos">
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
				<div class="col-sm-1 pt-1">
					<botaoBuscaCandidato @msgSuccess="msgSuccess = $event" @msgError="msgError = $event" :filtro="filtro"/>
				</div>
				<div class="col-sm-10">
					<msgSucesso v-if="msgSuccess" :msgSuccess="msgSuccess"/>
					<msgError v-if="msgError" :msgError="msgError"/>
				</div>
			</div>
		</div>
	</templateBusca>
</template>

<script>
import templateBusca from './templateBusca'
import inputNome from '../form/inputNome'
import inputCpf from '../form/inputCpf'
import selectProfessores from '../select/selectProfessores'
import selectSeries from '../select/selectSeries'
import selectTurnos from '../select/selectTurnos'
import selectTurmas from '../select/selectTurmas'
import selectAtencoes from '../select/selectAtencoes'
import botaoBuscaCandidato from '../botao/botaoBuscaCandidato'
import msgSucesso from '../mensagem/sucesso'
import msgError from '../mensagem/error'

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
		msgSucesso,
		msgError
	},
	data() {
		return {
			msgError: null,
			msgSuccess: null,
			filtro: {}
		}
	},
	props: {
		classTitulo: {
			type: String
		}
	}
}
</script>