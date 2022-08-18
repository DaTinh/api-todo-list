<template>
  <div>
    <form @submit="onSubmit" class="form-group">
      <input type="text" v-model="title" />
      <input type="submit" value="Submit"/>
    </form>
  </div>
</template>

<script>
import { mapActions } from "vuex"
import { v4 as uuid4 } from "uuid"

export default {
  name: "AddTodo",
  data() {
    return {
      title: "",
    };
  },
  methods: {
    ...mapActions(["addTodo"]),
    onSubmit(event) {
      event.preventDefault();
      this.addTodo({
        id: uuid4(),
        title: this.title,
        completed: false,
      });
      this.title = "";
    }
    
  },
};
</script>

<style scoped>
input[type="submit"] {
    width: 7%;
    height: 50px;
}

form.form-group {
    text-align: center;
}

input[type="text"] {
    width: 50%;
    margin-top: 34px;
    height: 50px;
}
</style>