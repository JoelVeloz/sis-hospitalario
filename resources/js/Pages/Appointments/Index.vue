<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref, watch } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import DialogModal from '@/Components/DialogModal.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import InputError from '@/Components/InputError.vue';

defineProps({
    appointments: Array,
});

const form = useForm({
    date: '',
});

watch(form, async () => {
    // console.log(form)
    form.get(route('appointments.index'));
});

</script>
        
<template>
    <AppLayout title="Sistema Hospitalario">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Sistema Hospitalario
            </h2>
        </template>




        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="py-3">
                    Buscar por fecha
                    <InputLabel value="Fecha" />
                    <TextInput v-model="form.date" type="date" class="mt-1 block w-full" autofocus />
                </div>
                <div class="bg-white shadow-md rounded ">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Estado de la cita medica</th>
                                <th class="py-3 px-6 text-left">Doctor Asignado</th>
                                <th class="py-3 px-6 text-center">Paciente</th>
                                <th class="py-3 px-6 text-center">Fecha/hora</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            <tr v-for="appointment in appointments" class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <span v-if="appointment.status == 'Atendido'"
                                        class="font-medium text-green-600">{{appointment.status}}</span>
                                    <span v-else="appointment.status != 'Atendido'"
                                        class="font-medium text-red-700">{{appointment.status}}</span>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <span class="font-medium">{{appointment.doctor.name}}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="font-medium">{{appointment.patient.name}}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="font-medium">{{appointment.date}}</span>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
        