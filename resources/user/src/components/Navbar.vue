<template>
  <div class="navbars">
    <h1>My vuex App Todos</h1>
    <ul>
      <li><router-link to="/">Home</router-link></li>
      <li><router-link to="/about">About</router-link></li>
      <li><router-link to="/product">Product</router-link></li>
      <li v-if="isAuthentication">
        Todo total: {{ todos.length }}
        <button class="btn btn-primary" @click="TOGGLE_AUTH">Logout</button>  
      </li>
      <li v-else>
          <button class="btn btn-succes" @click="TOGGLE_AUTH">Login</button>
      </li>
    </ul>
  </div>
</template>

<script>
import { mapMutations, mapGetters } from "vuex";

export default {
  name: 'NavBar',
  computed: mapGetters(['isAuthentication','todos']),
  methods: mapMutations(['TOGGLE_AUTH'])
};
</script>

<style>
.navbars {
  padding: 5px;
  text-align: center;
  background: rgb(231, 205, 205);
  color: black;
}
.navbars ul {
  display: flex;
  justify-content: space-around;
  align-items: center;
  list-style: none;
  padding: 0;
}

a {
    font-size: 25px;
    font-weight: 500;
    color: black !important;
}

a:hover {
    background-color: yellow;
    text-decoration: none !important;
}
</style>