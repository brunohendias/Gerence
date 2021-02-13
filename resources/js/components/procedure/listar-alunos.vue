<template>
	<div class="col-sm-12">
		<h3>Dados do aluno</h3>
		<table v-if="dadosAlunos.length > 0" class="table table-striped border-dark table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>Nome</th>
					<th>CPF</th>
					<th>Nota 1</th>
					<th>Nota 2</th>
					<th>Nota 3</th>
					<th>Nota 4</th>
					<th>Nota 5</th>
					<th>Nota 6</th>
					<th>Media</th>
					<th>Situação</th>
					<th>Editar</th>
					<th>Excluir</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(aluno, i) in dadosAlunos" :key="i">
					<th>{{ aluno.nome }}</th>
					<th>{{ aluno.cpf }}</th>
					<th>{{ aluno.nota1 }}</th>
					<th>{{ aluno.nota2 }}</th>
					<th>{{ aluno.nota3 }}</th>
					<th>{{ aluno.nota4 }}</th>
					<th>{{ aluno.nota5 }}</th>
					<th>{{ aluno.nota6 }}</th>
					<th>
						<font v-if="parseFloat(aluno.media) < 5" color="#d00">{{ aluno.media }}</font>
						<font v-else >{{ aluno.media }}</font>
					</th>
					<th>
						<font v-if="aluno.situacao == 'Aprovado'" color="#0d0">{{ aluno.situacao }}</font> 
						<font v-else-if="aluno.situacao == 'Reprovado'" color="#d00">{{ aluno.situacao }}</font> 
					</th>
					<th>
						<a class="btn border-dark" data-toggle="modal" data-target="#modal" @click="pegarAluno(aluno)"><img src="https://img.icons8.com/windows/20/000000/edit-file.png"></a>
					</th>
					<th>
						<a class="btn border-dark" @click="excluirAluno(aluno)"><img src="https://img.icons8.com/material/20/000000/delete--v1.png"></a>
					</th>
				</tr>
			</tbody>
		</table>
		<div v-else>Nenhum aluno encontrado!</div>
		<div class="modal fade" id="modal">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Editar o aluno {{ nome }}</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">X</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<span class="col-6"><strong>Nome:</strong></span>
							<span class="col-6"><strong>CPF:</strong></span>
						</div>
						<div class="row mb-3">
							<div class="col-sm-6">
								<input type="text" v-model="novoAluno.nome" name="nome-modal" onkeypress="return event.charCode > 64 && event.charCode < 91 || event.charCode > 96 && event.charCode < 123 || event.charCode > 191 && event.charCode <= 255 || event.charCode == 32" placeholder="Nome"/>
							</div>
							<div class="col-sm-6">
								<input type="text" v-mask-cpf v-model="novoAluno.cpf" name="cpf-modal" placeholder="000.000.000-00" />
							</div>
						</div>
						<div class="row">
							<span class="col-sm-4"><strong>Nota 1</strong></span>
							<span class="col-sm-4"><strong>Nota 2</strong></span>
							<span class="col-sm-4"><strong>Nota 3</strong></span>
						</div>
						<div class="row mb-3">
							<div class="col-sm-4" v-for="i in 3" :key="i">
								<input type="text" class="w-75" maxlength="5" v-model="novoAluno.notas[i-1]" name="nota1-modal" v-mask-number placeholder="00,00"/>	
							</div>
						</div>
						<div class="row">
							<span class="col-sm-4"><strong>Nota 3</strong></span>
							<span class="col-sm-4"><strong>Nota 4</strong></span>
							<span class="col-sm-4"><strong>Nota 5</strong></span>
						</div>
						<div class="row mb-3">
							<div class="col-sm-4" v-for="i in 3" :key="i">
								<input type="text" class="w-75" maxlength="5" v-model="novoAluno.notas[i+2]" name="nota1-modal" v-mask-number placeholder="00,00"/>
							</div>
						</div>
						<div class="row">
							<span class="col-sm-6"><strong>Media</strong></span>
							<span class="col-sm-6"><strong>Situação</strong></span>
						</div>
						<div class="row mb-3">
							<div class="col-sm-6">
								<input type="text"  v-model="novoAluno.media" readonly name="media-modal" placeholder="Media" />
							</div>
							<div class="col-sm-6">
								<input type="text" v-model="novoAluno.situacao" readonly name="situacao-modal" placeholder="Situação"/>
							</div>
						</div>

					</div>
					<div class="modal-footer">
						<button class="btn btn-dark m-3" @click="calcularMedia()">Calcular media</button>
						<button type="button" class="btn btn-primary" @click="editarAluno()" data-dismiss="modal">Save changes</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import apiDadosAlunos from '../../core/apiDadosAlunos'

export default{
	name: 'listar-alunos',

	created() {
		this.buscaDadosAlunos()
	},

	data() {
		return {
			dadosAlunos: [],
			novoAluno: {
				nome: '',
				cpf: '',
				notas: [],
				media: '',
				situacao: ''
			},
			nome: ''
		}
	},

	props: ['novoAlunoCadastrado'],

	watch: {
		novoAlunoCadastrado: function() {
			this.buscaDadosAlunos()
		}
	},

	methods: {
		async buscaDadosAlunos() {
			await apiDadosAlunos.listarDadosAlunos().then(response => {
				if(response.data.length > 0) {
					this.dadosAlunos = response.data
				}
			})
		},
		pegarAluno(aluno) {
			this.novoAluno.id = aluno.id
			this.nome = aluno.nome
			this.novoAluno.nome = aluno.nome
			this.novoAluno.cpf = aluno.cpf
			this.novoAluno.notas[0] = aluno.nota1
			this.novoAluno.notas[1] = aluno.nota2
			this.novoAluno.notas[2] = aluno.nota3
			this.novoAluno.notas[3] = aluno.nota4
			this.novoAluno.notas[4] = aluno.nota5
			this.novoAluno.notas[5] = aluno.nota6
			this.novoAluno.media = aluno.media
			this.novoAluno.situacao = aluno.situacao
		},
		calcularMedia() {
			let media = 0
			let qtdNotas = 0
			let total = 0
			let notas = this.novoAluno.notas
			if(notas != ''){
				for(let i=0;i < 6;i++){
					if(notas[i] === undefined || notas[i] == null) {
						notas[i] = ''
					}else if(notas[i] != ''){
						notas[i].replace(",", ".")
						total += parseFloat(notas[i])
						qtdNotas += 1
					}
				}
			}
	      	this.novoAluno.media = total / qtdNotas
	      	if(this.novoAluno.media >= 5){
	          this.corResultado = 'text-success'
	          this.novoAluno.resultado = 'Aprovado'
	          this.novoAluno.situacao = 'Aprovado'
	        }else{
	          this.corResultado = 'text-danger'
	          this.novoAluno.resultado = 'Reprovado'
	          this.novoAluno.situacao = 'Reprovado'
	        }
		},
		editarAluno() {
			let msg = "Deseja realmente atualizar o aluno "+this.nome+" ?"
			swal({
				title: msg,
				icon: 'warning',
				buttons: [
					'não',
					'sim'
				]
			}).then(async willChange => {
				if(willChange) {
					let notas = this.novoAluno.notas
					let dados = {
			          'nome': this.novoAluno.nome,
			          'cpf': this.novoAluno.cpf,
			          'nota1': notas[0],
			          'nota2': notas[1],
			          'nota3': notas[2],
			          'nota4': notas[3],
			          'nota5': notas[4],
			          'nota6': notas[5],
			          'media': this.novoAluno.media.toFixed(2),
			          'situacao': this.novoAluno.resultado
			        }
					await apiDadosAlunos.atualizarAluno(this.novoAluno.id, dados).then(response => {
						let msg = "Os dados do aluno "+this.nome+" foram atualizados com sucesso!"
						swal({
							title: msg,
							icon: "success"
						})
						this.buscaDadosAlunos()
					}).catch(err => {
						swal({
							title: "Erro ao atualizar os dados do aluno",
							icon: 'error'
						})
					})
				}
			})
		},
		excluirAluno(aluno) {
			let msg = "Deseja realmente excluir o aluno "+aluno.nome+" ?"
			swal({
				title: msg,
				icon: 'warning',
				buttons: [
					'não',
					'sim'
				]
			}).then(async willDelete => {
				if(willDelete) {
					await apiDadosAlunos.deletarAluno(aluno.id).then(reponse => {
						let msg = "Aluno "+aluno.nome+" deletado com suscesso!"
						swal({
							title: msg,
							icon: 'success'
						})
						this.buscaDadosAlunos()
					}).catch(err => {
						swal({
							title: "Erro ao excluir o aluno",
							icon: 'error'
						})
					})
				}
			})
		}
	}
}
</script>