<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import AssignmentList from '@/Components/Assignments/AssignmentList.vue';
import AssignmentCreate from '@/Components/Assignments/AssignmentCreate.vue';

defineProps({
    'assignments': Object,
    'inProgressAssignments': Object,
    'completeAssignments': Object,
})

</script>

<template>
    <app-layout title="Assignments">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Assignments
            </h2>
        </template>

        <section class="py-12">
                <div class="grid grid-cols-2">
                    <div class="max-w-7xl mx-auto">
                        <assignment-list :assignments="inProgressAssignments"
                                         title="In Progress">
                        </assignment-list>
                        <div class="pt-5">
                            <assignment-create></assignment-create>
                        </div>
                    </div>
                    <div class="max-w-7xl mx-auto">
                        <div v-show="completeAssignments.length">
                            <assignment-list :assignments="completeAssignments"
                                             title="Completed"
                            ></assignment-list>
                        </div>
                    </div>
                </div>

        </section>


        <!--        <div class="py-12">-->
        <!--            <div class="grid grid-cols-2">-->
        <!--                <div class="max-w-7xl mx-auto">-->
        <!--                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">-->
        <!--                        &lt;!&ndash; inProgress &ndash;&gt;-->
        <!--                        <h3 class="font-bold text-lg pb-3">In Progress</h3>-->
        <!--                        <div v-for="assignment in assignments.filter(assignment => ! assignment.complete)">-->
        <!--                            <li>-->
        <!--                                <label>-->
        <!--                                    {{ assignment.name }}-->
        <!--                                    <input type="checkbox" v-model="assignment.complete"/>-->
        <!--                                </label>-->
        <!--                            </li>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">-->
        <!--                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">-->
        <!--                        &lt;!&ndash; Completed &ndash;&gt;-->
        <!--                        <h3 class="font-bold text-lg pb-3">Completed</h3>-->
        <!--                        <div v-for="assignment in assignments.filter(assignment => assignment.complete)">-->
        <!--                            <li>-->
        <!--                                <label>-->
        <!--                                    {{ assignment.name }}-->
        <!--                                    <input type="checkbox" v-model="assignment.complete"/>-->
        <!--                                </label>-->
        <!--                            </li>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
    </app-layout>
</template>

