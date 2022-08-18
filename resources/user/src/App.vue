<template>
  <div id="app">
    <!-- <Navbar />
    <router-view />
    <Todo />
    <StatusBar />
    <ProgressBar /> -->
    -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    <Todo2 />
  </div>
</template>

<script>
// import Todo from './components/ToDo.vue'
// import Navbar from './components/Navbar.vue'
// import StatusBar from './components/StatusBar.vue'
// import ProgressBar from './components/ProgressBar.vue'
import Todo2 from './components/Todo/TodosComponent.vue'

export default {
  name: 'App',
  components:{ Todo2 }
  
}
</script>

<style>
#app {
  max-width: 1280px;
  margin: 0 auto;
  padding: 3rem;
  font-weight: normal;
}
</style>
