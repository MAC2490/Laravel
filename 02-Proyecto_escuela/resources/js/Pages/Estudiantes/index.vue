<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Estudiantes
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="ml-12 md:col-span-3">
                        <div class="p-6 max-w-md mx-auto bg-white rounded-md shadow-md">
                            <h2 class="text-2xl font-semibold mb-4">Crear Nuevo Estudiante</h2>
                            <form @submit.prevent="submit">
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Nombre</label>
                                    <input v-model="nombre" type="text" class="mt-1 p-2 w-full border rounded-md">
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Apellido</label>
                                    <input v-model="apellido" type="text" class="mt-1 p-2 w-full border rounded-md">
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Documento</label>
                                    <input v-model="documento" type="text" class="mt-1 p-2 w-full border rounded-md">
                                </div>
                                <div class="text-center">
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md">Crear</button>
                                    <a :href="route('estudiantes.index')" class="bg-green-500 text-white px-4 py-2 ml-3 rounded-md">Listar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </AppLayout>
</template>
<script>
    export default {
        props:{
            datos:Array
        },
        data(){
            return{
                form:{
                    nombre: '',
                    apellido: '',
                    documento: '',
                }
            }
        },
        methods: {
            submit(){
                this.$inertia.post(this.route('estudiantes.store'), this.form)
            }
        }
    }
</script>
