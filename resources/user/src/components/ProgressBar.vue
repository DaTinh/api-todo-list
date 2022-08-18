<template>
  <div class="progress" v-if="isAuthentication">
    <p>Progress: {{ progress }}%</p>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  name: "ProgressBar",
  computed: mapGetters(['progress','isAuthentication']),
    
};
</script>

<style>

.progress {
    font-size: 23px;
    padding: 40px;
    background-color: rgb(87, 216, 87) !important;  
}
.progress p {
    font-size: 23px;
    text-align: center;
    margin-left: 450px;
}
</style>