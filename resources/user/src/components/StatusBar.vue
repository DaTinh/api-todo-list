<template>
  <div class="status-bar" v-if="isAuthentication">
      <p>Done</p>
      <ul>
          <li v-for="todo in doneTodos" 
              :key="todo.id">
              {{ todo.title }}
          </li>
      </ul>
  </div>
</template>

<script>
import {mapGetters} from 'vuex'
export default {
    name: 'StatusBar',
    computed: mapGetters(['doneTodos', 'isAuthentication'])
}
</script>

<style>

</style>