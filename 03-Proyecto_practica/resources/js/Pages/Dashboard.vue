<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <div class="">
            <div class="p-6 border-b border-gray-200">
                <div class="flex justify-center">
                    <div class="p-4 bg-white rounded-md" style="width: 40%;">
                        <h2 class="text-xl text-center font-semibold mb-6">Crear Nuevo Estudiante</h2>
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
                            <div class="flex justify-center mt-6">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 mr-4 rounded-md">Registrar</button>
                                <a class="bg-green-500 text-white px-4 py-2 rounded-md" :href="route('dashboard')">Volver</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
    import { Head } from '@inertiajs/vue3';
</script>

<script>
    export default {
        data() {
            return {
                form:{
                    nombre: '',
                    apellido: '',
                    documento: ''
                }
            };
        },
        methods:{
            submit(){
                this.$inertia.post(this.route('estudiantes.store'), this.form);
                console.log("folmulario enviado ", this.form);
            }
        }
    };
</script>
