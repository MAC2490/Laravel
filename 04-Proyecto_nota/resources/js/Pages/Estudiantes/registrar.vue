<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref } from "vue";
import axios from "axios";
const form = ref({
    nombre:  '',
    apellido:  '',
    documento:  ''
});

function submit() {
    axios.post(`/url`, form.value).then(respuesta => {
        console.log(respuesta.data.status);
        if (respuesta.data.status) {
            window.location.href = '/url';
        }
    })
    .catch(error => {
        console.error('Error al guardar los datos:', error);
    });
}
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Registrar Estudiantes
            </h2>
        </template>
        <div class="flex justify-center mt-16">
            <div class="w-3/12 p-4 bg-white rounded-md shadow-md">
                <h2 class="mb-6 text-xl font-semibold">Crear Nuevo Estudiante</h2>
                <form @submit.prevent="submit" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input v-model="form.nombre" type="text" class="w-full p-2 mt-1 border rounded-md">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Apellido</label>
                        <input v-model="form.apellido" type="text" class="w-full p-2 mt-1 border rounded-md">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Documento</label>
                        <input v-model="form.documento" type="text" class="w-full p-2 mt-1 border rounded-md">
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" class="px-4 py-2 mr-4 text-white bg-blue-500 rounded-md">Registrar</button>
                        <a class="px-4 py-2 text-white bg-green-500 rounded-md" :href="route('dashboard')">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </AppLayout>
</template>
