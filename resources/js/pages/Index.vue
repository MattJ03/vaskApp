<template>
    <h1></h1>
    <div class="tasks">
        <p v-if="loading"> loading tasks... </p>
        <p v-else-if="tasks.length === 0"> No tasks </p>
        <div v-else class="task-grid">
            <TaskGrid
                v-for="task in tasks"
                :key="task.id"
                :task="task"
                />

        </div>
    </div>

</template>
<script setup>
import { ref } from 'vue';
import { reactive } from 'vue';
import { useRouter } from 'vue-router';
import { onMounted } from 'vue';
import axios from 'axios';

import TaskGrid from "../components/TaskGrid.vue";

const loading = ref(true);
const error = ref('');
const tasks = ref([]);


onMounted(async () => {
   try {
      const res = await axios.get('/api/tasks');
      tasks.value = res.data;
      console.log('got tasks');
   } catch(error) {
       console.log('couldnt get tasks', error);
   } finally {
       loading.value = false;
   }
});


</script>
<style>
.tasks {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}
.tasks-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
}
</style>
