<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <template #header>
            Lista de estudiantes
        </template>
        
        <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
            <div class="p-4 bg-white rounded-md">
                <div class="m-3 flex justify-end">
                    <input v-model="datoBuscar" type="text" class="form-text rounded-md mr-4" placeholder="Buscar...">
                    <button @click="buscar" class="bg-blue-500 rounded ml-2 px-4 text-white">Buscar</button>
                </div>
                <table class="w-full">
                    <thead class="bg-gray-50 text-center">
                        <tr>
                            <th scope="col" class="px-6 py-3 uppercase tracking-wider">Nombre</th>
                            <th scope="col" class="px-6 py-3 uppercase tracking-wider">Apellido</th>
                            <th scope="col" class="px-6 py-3 uppercase tracking-wider">Documento</th>
                            <th scope="col" class="px-6 py-3 uppercase tracking-wider"></th>
                            <th scope="col" class="px-6 py-3 uppercase tracking-wider"></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr v-for="dato in datos">
                            <td class="px-6 py-4 whitespace-nowrap">{{ dato.nombre }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ dato.apellido }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ dato.documento }}</td>
                            <td class="px-2 py-1 whitespace-nowrap"><a :href="`/estudiantes/${dato.id}/edit`" class="bg-orange-500 text-white px-4 py-2 rounded-md">Editar</a></td>
                            <td class="px-2 py-1 whitespace-nowrap"><button @click="eliminar(dato.id)" class="bg-red-500 text-white px-4 py-2 rounded-md">Eliminar</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import axios from 'axios';

</script>

<script>
    export default {
        props:{
            datos: Array
        },
        data(){
            return{
                form:{
                    nombre: this.datos.nombre,
                    apellido: this.datos.apellido,
                    documento: this.datos.documento
                },
            }
        },
        methods:{
            eliminar(id){
                axios.delete(`/estudiantes/${id}`).then(respuesta=>{
                    console.log(respuesta.data);
                    if (respuesta.data.status) {
                        console.log( this.datos )

                        for (let i = 0; i < this.datos.length; i++) {
                            if( this.datos[i].id == id ){
                                this.datos = this.datos.splice(i, 1);
                                break;
                            }
                        }

                    }

                }).catch(error=>{
                    console.log(error.response)
                    console.log(error)
                })
            },
            buscar(){
                for (let i = 0; i < this.datos.length; i++) {
                    if (this.datoBuscar == this.datos[i].nombre || this.datoBuscar == this.datos[i].apellido || this.datoBuscar == this.datos[i].documento) {
                        const id = this.datos[i].id;
                        window.location.href = `/estudiantes/${id}/edit`;
                    }
                }
            }
        }
    };
</script>
