<template>
  <div>
    <h2 class="text-xl font-semibold mb-2">ToDo List</h2>
    
    <div class="mb-4">
      <input 
        v-model="newTodo" 
        @keyup.enter="addTodo"
        type="text" 
        placeholder="Add a new task" 
        class="px-4 py-2 border rounded mr-2"
      />
      <button 
        @click="addTodo" 
        class="px-4 py-2 bg-blue-500 text-white rounded"
      >
        Add
      </button>
    </div>
    
    <ul v-if="todos.length > 0" class="list-disc pl-5">
      <li v-for="(todo, index) in todos" :key="index" class="mb-2">
        <div class="flex items-center">
          <input 
            type="checkbox" 
            v-model="todo.completed" 
            class="mr-2"
          />
          <span :class="{ 'line-through': todo.completed }">
            {{ todo.text }}
          </span>
          <button 
            @click="removeTodo(index)" 
            class="ml-2 px-2 py-1 bg-red-500 text-white text-xs rounded"
          >
            Delete
          </button>
        </div>
      </li>
    </ul>
    <p v-else>No tasks yet. Add one!</p>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref } from 'vue';

interface Todo {
  text: string;
  completed: boolean;
}

export default defineComponent({
  name: 'TodoList',
  setup() {
    const newTodo = ref('');
    const todos = ref<Todo[]>([]);

    const addTodo = () => {
      if (newTodo.value.trim()) {
        todos.value.push({
          text: newTodo.value,
          completed: false
        });
        newTodo.value = '';
      }
    };

    const removeTodo = (index: number) => {
      todos.value.splice(index, 1);
    };

    return {
      newTodo,
      todos,
      addTodo,
      removeTodo
    };
  }
});
</script> 