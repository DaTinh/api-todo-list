<template>
  <div class="todo-list">
      <AddTodo />
    <ul v-if="isAuthentication">
      <li
        v-for="todo in todos"
        :key="todo.id"
        :class="todo.completed ? 'done' : ''"
      >
        {{ todo.title }}
        
        <button class="btn btn-danger delete" @click="deleteTodo(todo.id)">Delete</button>
        <input
          class=" checkbox"
          type="checkbox"
          :checked="todo.completed"
          @click="MARK_COMPLETE(todo.id)"
        />
      </li>
    </ul>
    <p v-else>Not authorised</p>
  </div>
</template>

<script>
import {mapMutations, mapActions, mapGetters} from 'vuex'
import AddTodo from './AddTodo.vue'
export default {
    name: 'ToDos',
    computed: mapGetters(['isAuthentication', 'todos']),
    components: {
        AddTodo
    },
    created() {
        this.getTodos()
    },
    methods: {
        ...mapMutations(['MARK_COMPLETE']),
        ...mapActions(['deleteTodo', 'getTodos'])
    }
}
</script>

<style scoped>
.todo-list ul {
  padding: 10px;
  list-style-type: none;
}

.todo-list li {
  padding: 10px;
  cursor: pointer;
  margin: 10px 0;
  border-radius: 4px;
  background: rgb(253, 236, 236);
  color: black;
}

.done {
  text-decoration-line: line-through;
}

button.delete {
    margin-top: -7px;
    float: right;
}

input.checkbox {
    margin: 6px;
    float: right;
}
</style>