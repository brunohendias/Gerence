<template>
	<templateBusca :classTitulo="classTitulo" titulo="Busque as inscrições">
		<div class="col-sm-6">
			<div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" placeholder="Ex: João Silva" class="form-control" name="nome" v-model="filtro.nominsc" />
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
				<div class="col-sm-1 pt-1">
					<botaoBuscaInscricao @msgSuccess="msgSuccess = $event" @msgError="msgError = $event" :filtro="filtro"/>
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
import inputCpf from '../form/inputCpf'
import selectSeries from '../select/selectSeries'
import selectTurnos from '../select/selectTurnos'
import botaoBuscaInscricao from '../botao/botaoBuscaInscricao'
import msgSucesso from '../mensagem/sucesso'
import msgError from '../mensagem/error'

export default {
	name: 'buscaInscricao',
	components: {
		templateBusca,
		inputCpf,
		selectSeries,
		selectTurnos,
		botaoBuscaInscricao,
		msgSucesso,
		msgError
	},
	data() {
		return {
			filtro: {},
			msgSuccess: null,
			msgError: null
		}
	},
	props: {
		classTitulo: {
			type: String
		}
	}
}
</script>