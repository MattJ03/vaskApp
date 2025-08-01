<template>
   <TaskForm submitLabel="Create Task" @submit="createTask"></TaskForm>
</template>
<script setup>
import { ref } from 'vue';
import { reactive } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';
import TaskForm from "../components/taskForm.vue";

const error = ref('');
const router = useRouter();

const createTask = async (payload) => {
    try {
        await axios.post('api/store', payload);
        console.log(payload.json, 'posted to backend');
        await router.push('/index');
    } catch {
        console.log(error.value);
    }
}
</script>
<style>

</style>
