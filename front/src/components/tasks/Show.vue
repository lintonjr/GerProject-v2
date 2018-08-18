<template>
    <v-dialog
        v-model="dialog"
        fullscreen
        scrollable
    >
        <v-card>
            <v-toolbar card dark color="primary">
                <v-btn icon dark @click.native="dialog = false">
                    <v-icon>close</v-icon>
                </v-btn>
                <v-toolbar-title>{{ task.title }}</v-toolbar-title>
            </v-toolbar>

            <v-card-text>
                <p v-if="task.description">{{ task.description }}</p>
                <p v-if="task.due_date">{{ task.due_date }}</p>
                <p>{{ task.done == 1 ? 'Tarefa finalizada' : 'Tarefa pendente' }}</p>
            </v-card-text>
        </v-card>
    </v-dialog>
</template>

<script>
    import { eventHub } from "../../eventHub";
    export default {
        data(){
            return {
                dialog: false,
                task: {}
            }
        },
        mounted(){
            eventHub.$on('open-task', (task) => {
               this.dialog = true;
               this.task = task;
            });
        }
    }
</script>

<style scoped>

</style>