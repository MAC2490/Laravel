<script setup>
    const props = defineProps({
        datos: Array
    })
</script>

<template>
    <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
        <div class="p-4 bg-white rounded-md">
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
                        <td class="px-2 py-1 whitespace-nowrap"><a :href="`/url/${dato.id}/edit`" class="bg-orange-500 text-white px-4 py-2 rounded-md">Editar</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>