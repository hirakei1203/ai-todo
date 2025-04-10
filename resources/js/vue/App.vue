<template>
  <div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Vue 3 + TypeScript + Vite</h1>
    <p class="mb-4">Welcome to your new Vue.js application with TypeScript!</p>
    <TodoList />
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import TodoList from './components/TodoList.vue';

export default defineComponent({
  name: 'App',
  components: {
    TodoList
  }
});
</script>

<style scoped>
h1 {
  color: #42b983;
}
</style> 