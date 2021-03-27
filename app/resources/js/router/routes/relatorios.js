const path = '#'
const id = 3
const pai = id

export default [
    {
		path, id,
		name: 'Relatorios',
		icon: 'fas fa-registered'
	},
	{
		path, pai,
		name: 'Atenções',
		icon: 'fas fa-exclamation-triangle',
		api: 'atencoes'
	},
	{
		path, pai,
		name: 'Inscrições',
		icon: 'fas fa-file-alt',
		api: 'inscricoes'
	}
]