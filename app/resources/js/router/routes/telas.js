import Inscricoes from '@tela/Inscricao'
import Candidatos from '@tela/Candidato'
import Alunos from '@tela/Aluno'
import Serie from '@tela/Serie'

export default [
    {
		path: '/',
		redirect: '/inscricao'
	},
	{
		id: 1,
		path: '#',
		name: 'Listas',
		icon: 'fas fa-file-alt',
	},
	{
		path: '/inscricao',
		name: 'inscricao',
		icon: 'fas fa-file-alt',
		pai: 1,
		component: Inscricoes
	},
	{
		path: '/candidato',
		name: 'candidato',
		icon: 'fas fa-address-card',
		pai: 1,
		component: Candidatos
	},
	{
		path: '/aluno',
		name: 'aluno',
		icon: 'fas fa-user-graduate',
		pai: 1,
		component: Alunos
	},
	{
		id: 2,
		path: '#',
		name: 'Configurações',
		icon: 'fas fa-cogs'
	},
	{
		path: '/config/serie',
		name: 'série',
		icon: 'fas fa-chalkboard',
		pai: 2,
		component: Serie
	},
    {
		path: '*',
		name: 'not_found',
		component: Inscricoes
	}
]