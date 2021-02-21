import Inscricoes from '../../components/telas/Inscricoes.vue'
import Candidatos from '../../components/telas/Candidatos.vue'
import Alunos from '../../components/telas/Alunos.vue'
import Serie from '../../components/telas/Serie.vue'
import EditaInscricao from '../../components/shared/edicao/inscricao.vue'
import EditaSerie from '../../components/shared/edicao/serie.vue'

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
		path: '/config',
		name: 'configurações',
		icon: 'fas fa-cogs',
		component: Serie
	},
	{
		path: '/config/serie',
		name: 'série',
		icon: 'fas fa-chalkboard',
		parentMenu: 'configurações',
		component: Serie
	},
	{
		path: '/editainscricao',
		name: 'editainscricao',
		component: EditaInscricao
	},
	{
		path: '/editaserie',
		name: 'editaserie',
		component: EditaSerie
	},
	{
		path: '/cadastraserie',
		name: 'cadastraserie',
		component: EditaSerie
	},
	{
		path: '*',
		name: 'not_found',
		component: Inscricoes
	}
]

export default routes