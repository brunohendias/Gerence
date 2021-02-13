<template>
    <div>
        <label for="codatencao">Atenção</label>
        <select class="form-control" name="atencoes" id="atencoes" v-model="filtro.codatencao">
            <option value=""></option>
            <option v-for="atencao in atencoes" :value="atencao.codatencao" :key="atencao.codatencao">{{atencao.atencao}}</option>
        </select>
        <msgSemResultado v-if="msgatencao" :msg="msgatencao" />
    </div>
</template>

<script>
import msgSemResultado from '../mensagem/semResultado'
import apiAtencoes from '../../../core/entidade/apiAtencoes'

export default {
    name: 'selectAtencoes',
    components: {
        msgSemResultado
    },
    props: {
        filtro: {
            type: Object,
            default: {}
        }
    },
    data() {
        return {
            atencoes: [],
            msgatencao: null
        }
    },
    created() {
        this.buscaAtencoes()
    },
    methods: {
        async buscaAtencoes() {
			await apiAtencoes.buscaAtencoes().then(response => {
				if(response.data.success) {
					this.atencoes = response.data.data.atencoes
				} else {
					this.msgatencao = response.data.error.message
				}
			})
		},
    }
}
</script>