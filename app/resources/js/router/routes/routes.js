import Inscricoes from '@tela/Inscricao.vue'
import Candidatos from '@tela/Candidato.vue'
import Alunos from '@tela/Aluno.vue'
import Serie from '@tela/Serie.vue'
import EditaInscricao from '@edicao/inscricao.vue'
import EditaSerie from '@edicao/serie.vue'

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
		pai: 'listas',
		component: Inscricoes
	},
	{
		path: '/candidato',
		name: 'candidato',
		icon: 'fas fa-address-card',
		pai: 'listas',
		component: Candidatos
	},
	{
		path: '/aluno',
		name: 'aluno',
		icon: 'fas fa-user-graduate',
		pai: 'listas',
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
		pai: 'configurações',
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