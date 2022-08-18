<template>
  <div class="row todo-content">
    <div class="col-md-6">
      <div class="todo-list not-done">
        <h1>TODOS</h1>
        <div>
          <form @submit="onSubmit" class="input-group mb-3">
            <input
              type="text"
              class="form-control"
              v-model="textContent"
            />
            <input type="submit" value="Add" />
          </form>
        </div>
        <hr />
        <ul class="list-unstyled" v-for="todo in todos" :key="todo.id">
          <li class="ui-state-default li-items mt-1">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <input
                    type="checkbox"
                    v-model="todo.checked"
                    aria-label="Radio button for following text input"
                  />
                </div>
              </div>
              <input
                type="text"
                class="form-control"
                :class="{ 'done-task': todo.completed }"
                v-model="todo.content"
              />
              <div class="input-group-append remove-icon">
                <span class="input-group-text" @click="deleteTask(todo.id)"
                  >&#10060;</span
                >
              </div>
            </div>
          </li>
        </ul>
        <hr />
        <div class="todo-footer row">
          <div class="col-md-6">
            <div class="form-check form-check-inline" @click="checkAll(1)">
              &#9989;
              <label class="form-check-label" for="inlineRadio1"
                >Check all</label
              >
            </div>
            <div class="form-check form-check-inline" @click="checkAll(0)">
              &#10062;
              <label class="form-check-label" for="inlineRadio2"
                >UnCheck all</label
              >
            </div>
          </div>
          <div class="col-md-6 save-all">
            <div class="form-check form-check-inline save-all">
              <button
                type="button"
                @click="doneAll()"
                class="btn btn-success btn-sm"
              >
                DONE ALL &#10004;
              </button>
            </div>
            <div class="form-check form-check-inline save-all">
              <button
                type="button"
                @click="deleteAll()"
                class="btn btn-dark btn-sm"
              >
                DEL ALL &#10006;
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// import { v4 as uuid4 } from "uuid";
import axios from "axios";
import { mapGetters, mapActions } from "vuex";
export default {
  name: "TodoComponent",
  computed: mapGetters(["todos"]),
  created() {
    this.getTodos();
  },
  methods: {
    ...mapActions(['addTask', 'getTodos', 'deleteTask']),
    onSubmit(event) {
      event.preventDefault();
      this.addTask({
        content: this.textContent,
        checked: 0,
        completed: 0
      })
      this.textContent = ""
    },
    // addTask: function () {
    //   if (this.textContent.trim().length === 0) {
    //     return;
    //   }

    //   let params = {
    //     content: this.textContent,
    //     checked: false,
    //     completed: false,
    //   };

    //   axios.post("http://127.0.0.1:8000/api/add", params).then((response) => {
    //     this.todos = response.data.data;
    //   });
    //   this.textContent = "";
    // },

    // deleteTask: function (id) {
    //   if (confirm("Are you sure delete this Task?")) {
    //     axios
    //       .post("http://127.0.0.1:8000/api/delete", { id: id })
    //       .then((response) => {
    //         this.todos = response.data.data;
    //       });
    //   }
    // },
    
    deleteAll: function () {
      if (confirm("Are you sure delete Tasks?")) {
        let params = this.todos;
        axios
          .post("http://127.0.0.1:8000/api/delete-all", { params })
          .then((response) => {
            this.todos = response.data.data;
          });
      }
    },

    checkAll: function (check) {
      this.todos.forEach((todo) => {
        todo.checked = check;
      });
    },

    doneAll: function () {
      if (confirm("Are you sure done Tasks?")) {
        let params = this.todos;
        axios
          .post("http://127.0.0.1:8000/api/done-all", { params })
          .then((response) => {
            this.todos = response.data.data;
          });
      }
    },
  },
};
</script>

<style>
.todo-content {
  display: flex;
  justify-content: center;
}

.todo-list h1 {
  margin-top: 20px;
  padding-bottom: 20px;
  text-align: center;
  font-weight: bold;
}

.todo-footer {
  background-color: #d2e8ca;
  padding: 10px 20px 15px;
}

#done-items li {
  padding: 10px 0;
  border-bottom: 1px solid #ddd;
  text-decoration: line-through;
}

.done-task {
  text-decoration: line-through;
  color: orange !important;
}

.form-check-inline {
  cursor: pointer;
}

.remove-icon span {
  cursor: pointer;
}

.save-all {
  float: right;
}
</style>