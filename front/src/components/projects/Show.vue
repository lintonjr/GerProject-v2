<template>
    <v-layout row wrap>
        <v-flex xs12>
            <h2 class="mb-2">Nome do Projeto</h2>

            <p>ahsuasihas</p>
        </v-flex>

        <sections/>

        <v-flex xs12>
            <v-btn to="/projects">Voltar</v-btn>
        </v-flex>
    </v-layout>
</template>

<script>
    import sections from '../sections/List';
    export default {
        components: {
            sections
        }
    }
</script>

<style scoped>

</style>