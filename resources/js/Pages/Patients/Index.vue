<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import DialogModal from '@/Components/DialogModal.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import InputError from '@/Components/InputError.vue';

defineProps({
    patients: Array,
});

const showEditModal = ref(false);
const selectedPatient = ref(1);
let editPatientForm = useForm({
    name: '',
    lastname: '',
    identification: '',
    email: '',
    phone: '',
    address: '',
});




const deletePatient = (id) => {
    Inertia.delete(route('patients.destroy', id));
};

const openEditModal = (data) => {
    console.log(data);
    showEditModal.value = true;
    editPatientForm.value = data;
    console.log(editPatientForm.value);
};


const updatePatient = (data) => {
    // Inertia.put(route('patients.update', id), editPatientForm.value);
    // editPatientForm.value = data;
    editPatientForm.name = data.name;
    editPatientForm.lastname = data.lastname;
    editPatientForm.identification = data.identification;
    editPatientForm.email = data.email;
    editPatientForm.phone = data.phone;
    editPatientForm.address = data.address;

    editPatientForm.put(route('patients.update', data.id), {
        onFinish: () => {
            showEditModal.value = false;
        },
    });


};

const showPatient = (id) => {
    Inertia.get(route('patients.show', id));
};

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
                <div class="bg-white shadow-md rounded ">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Nombres </th>
                                <th class="py-3 px-6 text-left">Correo</th>
                                <th class="py-3 px-6 text-center">Telefono</th>
                                <th class="py-3 px-6 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            <tr v-for="patient in patients" class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <span class="font-medium">{{patient.name+" "+patient.lastname}}</span>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <span class="font-medium">{{patient.email}}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="font-medium">{{patient.phone}}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div v-on:click="showPatient(patient)" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </div>
                                        <div v-on:click="openEditModal(patient)"
                                            class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                        <div v-on:click="deletePatient(patient.id)"
                                            class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <DialogModal :show="showEditModal" @close="showEditModal = false">
            <template #title>
                Editar Paciente
            </template>

            <template #content>
                <div>
                    Edita los datos del paciente
                </div>
                <div>
                    <InputLabel value="Nombre" />
                    <TextInput v-model="editPatientForm.value.name" type="text" class="mt-1 block w-full" autofocus />
                    <InputError :message="editPatientForm.errors.name" />
                    <InputLabel value="Apellido" />
                    <TextInput v-model="editPatientForm.value.lastname" type="text" class="mt-1 block w-full"
                        autofocus />
                    <InputError :message="editPatientForm.errors.lastname" />
                    <InputLabel value="Identificacion" />
                    <TextInput v-model="editPatientForm.value.identification" type="text" class="mt-1 block w-full"
                        autofocus />
                    <InputError :message="editPatientForm.errors.identification" />
                    <InputLabel value="Correo" />
                    <TextInput v-model="editPatientForm.value.email" type="text" class="mt-1 block w-full" autofocus />
                    <InputError :message="editPatientForm.errors.email" />
                    <InputLabel value="Direcion" />
                    <TextInput v-model="editPatientForm.value.address" type="text" class="mt-1 block w-full"
                        autofocus />
                    <InputError :message="editPatientForm.errors.address" />
                </div>

            </template>

            <template #footer>
                <SecondaryButton @click="updatePatient(editPatientForm.value)">
                    Actualizar
                </SecondaryButton>
                <div class="px-2"></div>
                <SecondaryButton @click="showEditModal = false">
                    Close
                </SecondaryButton>
            </template>
        </DialogModal>
    </AppLayout>
</template>
    