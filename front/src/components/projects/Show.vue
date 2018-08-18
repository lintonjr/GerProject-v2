<template>
    <v-layout row wrap>
        <v-flex xs12>
            <h2 class="mb-2">{{ project.title }}</h2>

            <p>{{ project.description }}</p>
        </v-flex>

        <sections/>

        <v-flex xs12>
            <v-btn to="/projects">Voltar</v-btn>
        </v-flex>

        <show-tasks/>

    </v-layout>
</template>

<script>
    import sections from '../sections/List';
    import showTask from '../tasks/Show';
    export default {
        computed:{
            project(){
                const id = this.$route.params.id;
                return this.$store.getters['projects/byId'](id);
            }
        },
        components: {
            sections,
            'show-tasks': showTask
        }
    }
</script>

<style scoped>

</style>