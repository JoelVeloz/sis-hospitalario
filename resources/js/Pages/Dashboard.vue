<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
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
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <!-- <Welcome /> -->
                    <div class="flex flex-col">
                        <span>Puedes ingresar a las vistas de:</span>
                        <span>
                            - Pacientes
                        </span>
                        <span>
                            - Historial de Pacientes
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
