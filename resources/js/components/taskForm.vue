<template>
<h4 class="">Create Task</h4>
    <div class="form-group" >
        <label class="create-field"> Name </label>
        <input v-model="local.name"
    </div>
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
    }
});

const local = reactive({ ... props.model});

const emit = defineEmits(['submit']);

const onSubmit = async () => {
    submitting.value = true;
    errors.name = errors.description = errors.due_date = errors.status = '';

    if(!local.name) errors.name = 'Name required';
    if(!local.description) errors.description = 'Description required';
    if(!local.due_date) errors.due_date = 'due date required';
    if(!local.status) errors.status ='status required';
    if( errors.name || errors.description || errors.due_date || errors.status) {
        submitting.value = false;
    }

}

</script>
<style>
.form-group {
    margin-bottom: 3rem;
    border-radius: 10px;
    width: 50%;
}
.create-header {
    color: white;
}
.create-field {
    color: white;

}
</style>
