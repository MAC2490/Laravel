<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'; 
    import { useForm } from '@inertiajs/vue3';
    import axios from 'axios';

    const props = defineProps({ estudiante: Object })

    const form = useForm({
        nombre: props.estudiante.nombre,
        apellido: props.estudiante.apellido,
        documento: props.estudiante.documento 
    });

    const submit = () => {
        const id = props.estudiante.id;
        axios.put(`/estudiantes/${id}`,form).then(respuesta => {
            console.log(respuesta.data);
            window.location.href = `/estudiantes/`;
        }).catch(error => {
            console.log(error.response);
        });
    }; 
</script>

<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <div class="flex justify-center h-screen" style="height: 20%;">
            <div class="p-4 max-w-md bg-white rounded-md shadow-md" style="width: 50%;">
                <h2 class="text-xl font-semibold mb-6">Modificar Informacion del estudiante</h2>
                <form @submit.prevent="submit" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input id="nombre" v-model="form.nombre" type="text" class="mt-1 p-2 w-full border rounded-md">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Apellido</label>
                        <input id="apellido" v-model="form.apellido" type="text" class="mt-1 p-2 w-full border rounded-md">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Documento</label>
                        <input disabled v-model="form.documento" type="text" class="mt-1 p-2 w-full border rounded-md">
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 mr-4 rounded-md">Aceptar</button>
                        <a class="bg-green-500 text-white px-4 py-2 rounded-md" :href="route('estudiantes.index')">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
