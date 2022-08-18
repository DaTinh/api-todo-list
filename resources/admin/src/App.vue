<template>
    <div id="app">
      <input type="text" v-model="newTask">
      <button @click="addTask()">Add</button>
      <div v-for="(task, index) in tasks" :key="index">
        <input type="checkbox" v-model="task.done">
        <span :class="{done: task.done}">{{ task.content }}</span>

      </div>
    </div>
</template>

<script>
export default ({
  name: 'App',
  data() {
    return {
      newTask: '',
      tasks: []
    }
  },
  methods: {
    addTask: function() {
      this.tasks.push({
        content: this.newTask,
        done: false
      });
    }
  },
  component: {

  }
})
</script>
