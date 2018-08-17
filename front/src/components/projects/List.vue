<template>
    <v-layout row wrap>
        <v-flex xs3 v-for="n in 5" :key="n">
            <v-card color="blue-grey darken-2" class="white--text">
                <v-card-title primary-title>
                    <div class="headline">App Mobile Ljr</div>
                </v-card-title>
                <v-card-text>
                    Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos.
                </v-card-text>
                <v-card-actions>
                    <v-btn flat dark :to="'/projects/' + n">
                        Ver +
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-flex>

        <v-flex xs3>
            <projects-create></projects-create>
        </v-flex>
    </v-layout>
</template>

<script>
    import ProjectCreate from './Create';
    export default {
        name: "List",
        components: {
            'projects-create': ProjectCreate
        },
    }
</script>

<style scoped>

</style>