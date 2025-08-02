<template>
    <h1>Tasks List</h1>
    <button class="create-button" @click="openCreate">Create Task</button>
    <div class="tasks">
        <p v-if="loading"> loading tasks... </p>
        <p v-else-if="tasks.length === 0"> No tasks </p>
        <div v-else class="tasks-grid">
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
;
import { onMounted } from 'vue';
import axios from 'axios';
import TaskForm from "../components/taskForm.vue";
import { watch} from "vue";
import TaskGrid from "../components/TaskGrid.vue";
import router from "../router/index.js";

const loading = ref(true);
const error = ref('');
const tasks = ref([]);


onMounted(async () => {
   try {
      const res = await axios.get('/api/tasks');
      console.log('fetch result' + res.data);
      tasks.value = res.data.data;
   } catch(error) {
       console.log('couldnt get tasks', error.data);
   } finally {
       loading.value = false;
   }
});

const openCreate = async () => {
    try {
        await router.push('/create');
        console.log('Open create page');
    } catch(e) {
        console.log('erorr is ' + error.value);
    }
}




</script>
<style>
.tasks {
    display: grid;
    gap: 1rem;
}
.tasks-grid {
    display: grid;
    flex-direction: row;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
}
.create-button{
    width: 110px;
    height: 50px;
    color: white;
    background-color: black;
    display: flex;
    justify-content: center;
    font-size: 16px;
    border-radius: 12px;
}
</style>
