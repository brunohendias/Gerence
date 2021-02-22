<template>
	<templateBusca :classTitulo="classTitulo" titulo="Busque as inscrições">
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
					<teste />
				</div>
				<div class="col-md-10">
					<msgSucesso v-if="msg.tipo == 'sucesso'" :msg="msg.msg"/>
					<msgSemResultado v-else-if="msg.tipo == 'alerta'" :msg="msg.msg"/>
					<msgError v-else-if="msg.tipo == 'erro'" :msg="msg.msg"/>
				</div>
			</div>
		</div>
	</templateBusca>
</template>

<script>
import teste from '@botao/geraAluno'
import templateBusca from '../template/busca'
import inputCpf from '@form/inputCpf'
import selectSeries from '@select/series'
import selectTurnos from '@select/turnos'
import botaoBuscaInscricao from '@botao/busca/inscricao'
import msgSucesso from '@msg/sucesso'
import msgSemResultado from '@msg/semResultado'
import msgError from '@msg/error'

export default {
	name: 'buscaInscricao',
	components: {
		templateBusca,
		inputCpf,
		selectSeries,
		selectTurnos,
		botaoBuscaInscricao,
		msgSucesso,
		msgError,
		msgSemResultado,
		teste
	},
	props: {
		classTitulo: {
			type: String
		}
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