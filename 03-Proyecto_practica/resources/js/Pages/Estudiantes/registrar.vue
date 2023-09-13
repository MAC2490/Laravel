<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
</script>
<template>
    <AppLayout title="Dashboard">
        <template #header>
            <div class="flex justify-center h-screen">
                <div class="p-4 max-w-md bg-white rounded-md shadow-md">
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
                        <div class="flex justify-center">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 mr-4 rounded-md">Registrar</button>
                            <a class="bg-green-500 text-white px-4 py-2 rounded-md" :href="route('dashboard')">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </template>
    </AppLayout>
</template>

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
                document.addEventListener("click", () => {
                    click = true;
                });
                document.addEventListener("keydown", (Event) => {
                    if (click) {
                        this.$inertia.post(this.route('estudiantes.store'), this.form);
                        console.log("folmulario enviado ", this.form);
                    }else if (Event.key == "Enter") {
                        this.$inertia.post(this.route('estudiantes.store'), this.form);
                        console.log("folmulario enviado ", this.form);
                    }
                })
            }
        }
    };
</script>
