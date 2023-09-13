<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <table class="min-w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="text-center py-2 px-4 font-semibold">Nombre</th>
                                <th class="text-center py-2 px-4 font-semibold">Apellido</th>
                                <th class="text-center py-2 px-4 font-semibold">Documento</th>
                                <th class="text-center py-2 px-4 font-semibold"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center border-t" v-for="dato in datos">
                                <td class="py-2 px-4">{{ dato.nombre }}</td>
                                <td class="py-2 px-4">{{ dato.apellido }}</td>
                                <td class="py-2 px-4">{{ dato.documento }}</td>
                                <td>
                                    <a :href="route('estudiantes.edit', dato.id)" class="bg-blue-500 text-white px-4 py-2 ml-3 rounded-md">Editar</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
    export default {
        props: {
            datos: Array
        }
    }
</script>

