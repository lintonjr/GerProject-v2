<template>
    <div>
        <v-navigation-drawer app v-model="drawer" clipped="">
            <v-list>
                <v-list-tile to="/projects">
                    <v-list-tile-action>
                        <v-icon>dashboard</v-icon>
                        <v-icon
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>
                            Projetos
                        </v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>

                <v-list-tile @click="">
                    <v-list-tile-action>
                        <v-icon>schedule</v-icon>
                        <v-icon
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>
                            Agenda
                        </v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
            </v-list>
            </v-navigation-drawer>

        <v-toolbar app clipped-left color="red darken-4">
            <v-toolbar-side-icon @click.prevent="drawer = !drawer" class="white--text"></v-toolbar-side-icon>
            <v-toolbar-title class="white--text">Gerenciador de Projetos</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
                <v-btn flat class="white--text"><v-icon>exit_to_app</v-icon> Sair</v-btn>
            </v-toolbar-items>
        </v-toolbar>
    </div>
</template>

<script>
export default {
    data(){
        return {
            drawer: true
        }
    }
}
</script>

<style>

</style>