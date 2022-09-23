<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { computed, onMounted, onUnmounted, ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import DialogModal from '@/Components/DialogModal.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import InputError from '@/Components/InputError.vue';

defineProps({
    patient: Object,
});

const from = useForm({
    title: '',
    description: '',
    patient_id: '',
});

const crear = (patient) => {
    from.patient_id = patient.id;
    from.post(route('records.store'), {
        onSuccess: () => {
            from.reset();
        },
    });
};



</script>
        
<template>
    <AppLayout title="Sistema Hospitalario">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{patient.name+" "+patient.lastname}}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="font-bold">DATOS DEL PACIENTE:</h1>

                <InputLabel value="Nombres" />
                <p>{{patient.name}}</p>
                <InputLabel value="Apellidos" />
                <p>{{patient.lastname}}</p>
                <InputLabel value="Cedula" />
                <p>{{patient.identification}}</p>
                <InputLabel value="Telefono" />
                <p>{{patient.phone}}</p>
                <InputLabel value="Ubicacion" />
                <p>{{patient.address}}</p>
                <InputLabel value="Correo" />
                <p>{{patient.email}}</p>


                <br>
                <br>
                <br>
                <br>
                CREACION DE FICHA MEDICA:
                <InputLabel value="Titulo" />
                <TextInput v-model="from.title" type="text" class="mt-1 block w-full" autofocus />
                <InputError :message="from.errors.title" />
                <InputLabel value="description" />
                <TextInput v-model="from.description" type="text" class="mt-1 block w-full" autofocus />
                <InputError :message="from.errors.description" />
                <SecondaryButton @click="crear(patient)">
                    Crear Nueva ficha medica
                </SecondaryButton>
                <br>
                <br>
                <br>
                <br>
              
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Titulo </th>
                            <th class="py-3 px-6 text-left">Descripcion</th>
                            <th class="py-3 px-6 text-center">Doctor</th>
                            <th class="py-3 px-6 text-center">Creacion</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        <tr v-for="record in patient.records" class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <span class="font-medium">{{record.title}}</span>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <span class="font-medium">{{record.description}}</span>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <span class="font-medium">{{record.doctor.name}}</span>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <span class="font-medium">{{record.created_at}}</span>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


    </AppLayout>
</template>
        