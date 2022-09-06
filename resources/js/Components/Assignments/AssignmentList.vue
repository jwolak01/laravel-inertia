<script setup>
import Assignment from '@/Components/Assignments/Assignment.vue';

defineProps({
    assignments: Array,
    title: String,
})
</script>

<template>
    <section v-show="assignments.length" class="w-80">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
            <div class="flex justify-between items-start">
                <h2 class="font-bold mb-2">
                    {{ title }}
                    <span>({{ assignments.length }})</span>
                </h2>
            </div>

            <ul class="border border-gray-600 rounded mt-6 shadow">
                <assignment
                    v-for="assignment in assignments"
                    :key="assignment.id"
                    :assignment="assignment"
                ></assignment>
            </ul>

            <slot></slot>
        </div>
    </section>
</template>
