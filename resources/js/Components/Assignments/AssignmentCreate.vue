<script setup>
import {ref} from 'vue';
import {useForm} from '@inertiajs/inertia-vue3';


const form = useForm({
    name: '',
    complete: false,
});

const addAssignment = () => {
    form.post(route('assignments.store'), {
        preserveScroll: true,
        errorBag: 'addAssignment',
        onSuccess: () => form.reset(),
    });
};

</script>

<template>
    <form @submit.prevent="addAssignment">
        <div class="flex flex-row gap-1">
            <div class="basis-3/4 border border-gray-600 rounded text-black">
                <input v-model="form.name" placeholder="New assignment..." class="p-2"/>
            </div>
            <div class="basis-1/4">
                <button type="submit"
                        class="bg-emerald-600 hover:bg-emerald-500 rounded p-2 border-l"
                        :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Add
                </button>
            </div>
        </div>
    </form>
</template>

