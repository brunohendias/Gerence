<template>
    <div>
        <label for="codturma">Turma</label>
        <select class="form-control" name="turmas" id="turmas" v-model="filtro.codturma">
            <option value=""></option>
            <option v-for="turma in turmas" :value="turma.codturma" :key="turma.codturma">{{turma.turma}}</option>
        </select>
        <msgSemResultado v-if="msgturma" :msg="msgturma" />
    </div>
</template>

<script>
import msgSemResultado from '../mensagem/semResultado'
import apiTurma from '../../../core/entidade/apiTurma'

export default {
    name: 'selectTurmas',
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
            turmas: [],
            msgturma: null
        }
    },
    created() {
        this.buscaTurmas()
    },
    methods: {
        async buscaTurmas() {
			await apiTurma.buscaTurmas().then(response => {
				if(response.data.success) {
					this.turmas = response.data.data.turmas
				} else {
					this.msgturma = response.data.error.message
				}
			})
		},
    }
}
</script>