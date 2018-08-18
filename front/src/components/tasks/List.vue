<template>
    <v-list three-line subheader>
        <v-subheader>Tarefas - {{ section }}</v-subheader>
        <v-divider></v-divider>

        <div v-for="task in tasks" :key="task.id">
            <v-list-tile @click="open(task)">
                <v-list-tile-content>
                    <v-list-tile-title>{{ task.title }}</v-list-tile-title>
                    <v-list-tile-sub-title>{{ task.description }}</v-list-tile-sub-title>
                </v-list-tile-content>
            </v-list-tile>

            <v-divider></v-divider>
        </div>
    </v-list>
</template>

<script>
    import { eventHub } from "../../eventHub";

    export default {
        props: [
            'section'
        ],
        computed: {
            tasks(){
                return this.$store.state.tasks.all;
            }
        },
        methods: {
            open(n){
                eventHub.$emit('open-task', n);
            }
        },
        mounted(){
            this.$store.dispatch('tasks/getAll');
        }
    }
</script>

<style scoped>

</style>