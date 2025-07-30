<template>
    <div class="task-container">
        <h3><strong> {{ task.name }}</strong></h3>
        <p><strong> {{ task.due_date }}</strong></p>
        <p><strong> {{ task.status}}</strong></p>


    </div>
</template>
<script setup>
import { ref } from 'vue';

const task = defineProps({
    type: Object,
    required: true,
});
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
</style>
