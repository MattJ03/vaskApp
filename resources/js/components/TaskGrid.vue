<template>
    <div class="task-container">
        <h3><strong> {{ task.name }}</strong></h3>
        <p><strong> {{ task.due_date }}</strong></p>
        <p><strong> {{ task.status}}</strong></p>

        <button class="button-delete" @click=deleteTask>Delete</button>
    </div>
</template>
<script setup>
import { ref } from 'vue';
import axios from 'axios';
import { useRouter} from 'vue-router';

const error = ref('');
const router = useRouter();
const props = defineProps({
   task: {
       type: Object,
       required: true,
   }
});

const deleteTask = async () => {
    try {
        await axios.delete('tasks/destroy/${props.task.id}');
        router.back();
        console.log('task deleted');
    } catch(error) {
        console.log('Task not delete', error);
    }
}
</script>
<style>
task-container {
    width: 300px;
    height: 200px;
    border-radius: 14px;
    background-color: black;
    margin: 50px;
    flex-direction: column;
    display: flex;
    border: 2px;
}
button-delete {
     width: 50px;
    height: 35px;
    margin: auto;
    border: 2px;
    background: black;
    border-radius: 12px;
    flex: auto;
    flex-direction: column;
}
</style>
