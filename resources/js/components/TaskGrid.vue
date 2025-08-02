<template>
    <div class="task-container">
        <h3> {{ task.name }} </h3>
        <p> {{task.description}}</p>
        <p> {{ task.due_date }}</p>
        <p> {{ task.status}} </p>

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
        await axios.delete(`api/tasks/destroy/${props.task.id}`);
        console.log('task deleted');
    } catch(error) {
        console.log('Task not delete', error);
    }
}
</script>
<style>
.task-container {
    width: 250px;
    height: 300px;
    border-radius: 14px;
    display: grid;
    justify-content: center;
    flex-direction: row;
    padding: 2px;
    background-color: black;
    margin: 50px;
    border: 2px;
    color: white;
}
.button-delete {
    width: 110px;
    height: 50px;
    margin: auto;
    border: 2px;
    background: white;
    border-radius: 12px;
    flex: auto;
    font-size: 16px;
    flex-direction: column;
}
.button-delete:hover {
    background-color: gray;

}
</style>
