<template>
    <v-layout row wrap>
        <v-flex xs12>
            <h2 class="display-1 mb-4">Projetos</h2>
        </v-flex>

        <v-container grid-list-md>
            <router-view></router-view>
        </v-container>

    </v-layout>
</template>

<script>
    export default {
        name: "projects",
        data(){
          return {
              mensagem: 'Olá, Mundo!!'
          }
        },
        mounted(){
            console.log('estamos prontos!');
        }
    }
</script>

<style scoped>

</style>