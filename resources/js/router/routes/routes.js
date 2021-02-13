import Inscricoes from '../../components/telas/Inscricoes.vue'
import Candidatos from '../../components/telas/Candidatos.vue'
import Alunos from '../../components/telas/Alunos.vue'
import EditaInscricao from '../../components/shared/edicao/editaInscricao.vue'

const routes = [
	{
		path: '/',
		name: 'listas',
		icon: 'fas fa-file-alt',
		component: Inscricoes
	},
	{
		path: '/inscricao',
		name: 'inscricao',
		icon: 'fas fa-file-alt',
		parentMenu: 'listas',
		component: Inscricoes
	},
	{
		path: '/candidato',
		name: 'candidato',
		icon: 'fas fa-address-card',
		parentMenu: 'listas',
		component: Candidatos
	},
	{
		path: '/aluno',
		name: 'aluno',
		icon: 'fas fa-user-graduate',
		parentMenu: 'listas',
		component: Alunos
	},
	{
		path: '/editainscricao',
		name: 'editainscricao',
		component: EditaInscricao
	},
	{
		path: '*',
		name: 'not_found',
		component: Inscricoes
	}
]

export default routes