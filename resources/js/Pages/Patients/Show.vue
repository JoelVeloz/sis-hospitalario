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
    patient: Object,
});

const from = useForm({
    title: '',
    description: '',
    patient_id: '',
});

const crear = () => {
    from.post(route('appointments.store'), {
        onFinish: () => {
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
                <InputLabel value="Titulo" />
                <TextInput v-model="from.title" type="text" class="mt-1 block w-full" autofocus />
                <InputError :message="from.errors.title" />
                <InputLabel value="description" />
                <TextInput v-model="from.description" type="text" class="mt-1 block w-full" autofocus />
                <InputError :message="from.errors.description" />
                <SecondaryButton @click="crear()">
                    Crear Nueva ficha medica
                </SecondaryButton>
                <pre>
                    {{ patient }}
                  </pre>
            </div>
        </div>


    </AppLayout>
</template>
        