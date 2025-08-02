<template>
    <form class="form-container" @submit.prevent="onSubmit" novalidate>
        <h4 class="create-header">Create Task</h4>
    <div class="form-group" >
        <label class="create-field"> Name </label>
        <input type="text" v-model="local.name" />
        <p v-if="errors.name"> {{ errors.name }}</p>
    </div>
    <div class="form-group">
        <label class="create-field"> Description </label>
        <textarea v-model="local.description" />
        <p v-if="errors.description"> {{ errors.description }}</p>
    </div>
    <div class="form-group">
        <label class="create-field">Due Date </label>
        <input type="date" v-model="local.due_date" />
        <p v-if="errors.due_date"> {{ errors.due_date}}</p>
    </div>
    <div class="form-group">
        <label class="create-field"> Status </label>
        <select v-model="local.status">
            <option>Complete</option>
            <option>Incomplete</option>
        </select>
        <p v-if="errors.status"> {{ errors.status }}</p>
    </div>
        <button class="create-button" type="submit" :disabled="submitting">
            {{ submitLabel }}
        </button>
    </form>
</template>
<script setup>
import { ref } from 'vue';
import { reactive } from 'vue';
import { watch } from 'vue';

const errors = ref('');
const submitting = ref(false);

const props = defineProps({
    model: {
        type: Object,
        default: () => ({name: '', description: '', due_date: '', status: ''}),
    },
    submitLabel: {
        type: String,
        default: 'Save',
    },
});

const local = reactive({ ... props.model});

const emit = defineEmits(['submit']);

const onSubmit = async () => {
    submitting.value = true;
    errors.name = errors.description = errors.due_date = errors.status = '';

    if(!local.name) errors.name = 'Name required';
    if(!local.description) errors.description = 'Description required';
    if(!local.due_date) errors.due_date = 'due date required';
    if( errors.name || errors.description || errors.due_date || errors.status) {
        submitting.value = false;
        return;
    }
    try {
        await emit('submit', { ...local});
    } catch (e) {
        errors.value
    } finally {
        submitting.value = false;
    }


}

</script>
<style>
.form-container {
    width: 500px;
    height: 400px;
    padding: 2px;
    border-radius: 14px;
    border: black;
    color: black;
    display: flex;
    flex-direction: column;
    background-color: black;
    justify-content: center;
    margin: 0 auto;
    align-items: center;

}
.form-group {
    margin-bottom: 3rem;
    border-radius: 12px;
    flex-wrap: wrap;
    justify-content: center;
    align-content: center;
}
.create-header {
    color: white;
    justify-content: center;
    align-items: center;
    font-size: 18px;
}
.create-field {
    color: white;

}
.create-button {
    width: 110px;
    height: 50px;
    color: black;
    font-size: 16px;
    border-radius: 12px;
    display: flex;
    justify-content: center;


}
</style>
