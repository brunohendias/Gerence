<template>
    <div>
        EM construcao
        <botaoEditaSerie v-if="false"/>
    </div>
</template>

<script>
import botaoEditaSerie from '../botao/edita/serie'

export default {
    name: 'editarSerie',
    components: {
        botaoEditaSerie
    }
}
</script>