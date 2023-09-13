<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import axios from 'axios';
const props = defineProps({
    estudiante: Array
})

// function editar(id) {
//     axios.get(`/url/${id}/edit`).then(respuesta => {
//         console.log(respuesta.data.status);
//     }).catch(error => {
//         console.error('error');
//     })
// }

console.log(props.estudiante);
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Estudiantes Registrados
            </h2>
        </template>
        <div class="inline-block min-w-full overflow-hidden rounded-lg">
            <div class="flex justify-center p-4 bg-white rounded-md">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 tracking-wider uppercase">Nombre</th>
                            <th scope="col" class="px-6 py-3 tracking-wider uppercase">Apellido</th>
                            <th scope="col" class="px-6 py-3 tracking-wider uppercase">Documento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center" v-for="datos in estudiante">
                            <td class="px-6 py-4 whitespace-nowrap">{{ datos.nombre }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ datos.apellido }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ datos.documento }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a :href="`/url/${datos.id}/edit`">Editar</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <a href="/dashboard" class="p-2 ml-44 bg-blue-500 rounded">Volver</a>
    </AppLayout>
</template>
  