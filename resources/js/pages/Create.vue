<template>

</template>
<script setup>
import { ref } from 'vue';
import { reactive } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';
import TaskForm from "../components/taskForm.vue";

const error = ref('');
const form = reactive({
   name: "",
   description: "",
   due_date: "",
    status: "",
});
</script>
<style>

</style>
