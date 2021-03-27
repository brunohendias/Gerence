import Inscricao from '@edicao/inscricao'
import Serie from '@edicao/serie'

export default [
    {
		path: '/editainscricao',
		name: 'editainscricao',
		component: Inscricao
	},
	{
		path: '/editaserie',
		name: 'editaserie',
		component: Serie
	},
	{
		path: '/cadastraserie',
		name: 'cadastraserie',
		component: Serie
	}
]