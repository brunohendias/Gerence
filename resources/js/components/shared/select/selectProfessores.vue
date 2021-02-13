<template>
    <div>
        <label for="professores">Professor</label>
        <select class="form-control" name="professores" id="professores" v-model="filtro.codprof">
            <option value=""></option>
            <option v-for="professor in professores" :value="professor.codatencao" :key="professor.codprof">{{professor.nomprof}}</option>
        </select>
        <msgSemResultado v-if="msgprofessor" :msg="msgprofessor" />
    </div>
</template>

<script>
import msgSemResultado from '../mensagem/semResultado'
import apiProfessor from '../../../core/entidade/apiProfessor'

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
            professores: [],
            msgprofessor: null
        }
    },
    created() {
        this.buscaProfessores()
    },
    methods: {
        async buscaProfessores() {
			await apiProfessor.buscaProfessores().then(response => {
				if(response.data.success) {
					this.professores = response.data.data.professores
				} else {
					this.msgprofessor = response.data.error.message
				}
			})
		},
    }
}
</script>