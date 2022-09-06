<script setup>
import {useForm} from '@inertiajs/inertia-vue3';

const props = defineProps({
    assignment: Object
});

const form = useForm({
    _method: 'PUT',
    name: props.assignment.name,
    complete: props.assignment.complete,
});

const updateAssignment = () => {
    form.post(route('assignments.update', props.assignment), {
        preserveScroll: true,
        errorBag: 'updateAssignment',
        onSuccess: () => form.reset(),
    });
};
</script>

<template>
    <li>
        <form @submit.prevent="updateAssignment">
            <label class="border border-2 border-emerald-700 rounded p-2 m-2 flex justify-between items-center">
                {{ assignment.name }}
                <input @change="updateAssignment" type="checkbox" v-model="form.complete" value="form.complete" class="ml-3">
            </label>
        </form>
        <div v-text="props.assignment.sinceUpdate"></div>
    </li>
</template>

