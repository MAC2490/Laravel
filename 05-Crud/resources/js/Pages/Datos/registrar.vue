<script setup>
    import { ref } from 'vue';
    import axios from "axios";
    const form = ref({
        nombre: '',
        apellido: '',
        documento: '',
        email: ''
    });

    function submit() {
        axios.post(`/url`,form.value).then(respose => {
            console.log(respose.data.status);
        }).catch(error=>{
            console.error("Error al registrar los datos ", error);
        });
    };

</script>
<template>
    <div class="flex justify-center">
        <div class="w-96 mt-40">
            <div class="p-4 bg-white rounded-md shadow-xl">
                <h2 class="text-xl font-semibold mb-6">Crear Nuevo Estudiante</h2>
                <form @submit.prevent="submit" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input v-model="form.nombre" type="text" class="mt-1 p-2 w-full border rounded-md">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Apellido</label>
                        <input v-model="form.apellido" type="text" class="mt-1 p-2 w-full border rounded-md">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Documento</label>
                        <input v-model="form.documento" type="text" class="mt-1 p-2 w-full border rounded-md">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">email</label>
                        <input v-model="form.email" type="text" class="mt-1 p-2 w-full border rounded-md">
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 mr-4 rounded-md">Registrar</button>
                        <a class="bg-green-500 text-white px-4 py-2 rounded-md" :href="route('dashboard')">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>