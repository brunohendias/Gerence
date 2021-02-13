<template>
    <div>
        <label for="codsituacao">Situação</label>
        <select class="form-control" name="situacoes" id="situacoes" v-model="filtro.codsituacao">
            <option value=""></option>
            <option v-for="situacao in situacoes" :value="situacao.codsituacao" :key="situacao.codsituacao">{{situacao.situacao}}</option>
        </select>
        <msgSemResultado v-if="msgsituacao" :msg="msgsituacao" />
    </div>
</template>

<script>
import msgSemResultado from '../mensagem/semResultado'
import apiSituacoes from '../../../core/entidade/apiSituacoes'

export default {
    name: 'selectSituacoes',
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
            situacoes: [],
            msgsituacao: null
        }
    },
    created() {
        this.buscaSituacoes()
    },
    methods: {
        async buscaSituacoes() {
			await apiSituacoes.buscaSituacoes().then(response => {
				if(response.data.success) {
					this.situacoes = response.data.data.situacoes
				} else {
					this.msgsituacao = response.data.error.message
				}
			})
		}
    }
}
</script>