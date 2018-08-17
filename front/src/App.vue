<template>
  <v-app>
    <headers></headers>
    <v-content>
      <v-container grid-list-md>
        <router-view/>
      </v-container>
    </v-content>
    <v-footer app>
      <span>&copy; <a href="http://lintonjr.me">LintonJr</a> - {{ year }}</span>
    </v-footer>
  </v-app>
</template>

<script>
import Headers from './partials/Headers';
export default {
  name: 'App',
  computed: {
      year() {
          return (new Date()).getFullYear();
      }
  },
  components: {
      'headers': Headers
  }
}
</script>

