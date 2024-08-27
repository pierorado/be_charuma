<template>
    <Head title="Detalles del animal" />

    <AuthenticatedLayout>
        <div class="container bg-white mx-auto">
            <div class="flex justify-between items-center bg-yellow-950 p-4">
                <h1 class="text-2xl font-normal text-white">Detalles del animal</h1>
            </div>
            <div class="overflow-x-auto bg-white py-5 px-6" v-if="animal">

                <div class="mb-4">
                    <div class="flex items-center text-center">
                        <InputLabel for="arete" class="w-1/3" value="Arete" />
                        <div id="arete" class="block w-full w-2/3 px-3 py-2 border rounded-r border-gray-300">{{ animal.arete }}</div>
                    </div>
                </div>

                <div class="mb-4 flex items-center text-center">
                    <InputLabel for="ingreso" class="w-1/3" value="Ingreso" />
                    <div id="ingreso" class="block w-full w-2/3 px-3 py-2 border rounded-r border-gray-300">{{ animal.ingreso }}</div>
                </div>

                <div class="mb-4">
                    <div class="flex items-center text-center">
                        <InputLabel for="nombre_animal" class="w-1/3" value="Nombre" />
                        <div id="nombre_animal" class="block w-full w-2/3 px-3 py-2 border rounded-r border-gray-300">{{ animal.nombre_animal }}</div>
                    </div>
                </div>

                <div class="mb-4 flex items-center text-center">
                    <InputLabel for="sexo" class="w-1/3" value="Sexo" />
                    <div id="sexo" class="block w-full w-2/3 px-3 py-2 border rounded-r border-gray-300">{{ animal.sexo }}</div>
                </div>

                <div class="mb-4 flex items-center text-center">
                    <InputLabel for="raza_id" class="w-1/3" value="Raza" />
                    <div id="raza_id" class="block w-full w-2/3 px-3 py-2 border rounded-r border-gray-300">{{ animal.raza.nombre_raza}}</div>
                </div>

                <div class="mb-4">
                    <div class="flex items-center text-center">
                        <InputLabel for="fecha" class="w-1/3" value="Fecha" />
                        <div id="fecha" class="block w-full w-2/3 px-3 py-2 border rounded-r border-gray-300">{{ formattedFecha }}</div>
                    </div>
                </div>

                <div class="mb-4 flex items-center text-center">
                    <InputLabel for="clasificacion" class="w-1/3" value="Clasificación" />
                    <div id="clasificacion" class="block w-full w-2/3 px-3 py-2 border rounded-r border-gray-300">{{ animal.clasificacion }}</div>
                </div>

                <div class="mb-4">
                    <div class="flex items-center text-center">
                        <InputLabel for="precio_compra" class="w-1/3" value="Precio de compra" />
                        <div id="precio_compra" class="block w-full w-2/3 px-3 py-2 border rounded-r border-gray-300">{{ animal.precio_compra }}</div>
                    </div>
                </div>

                <div class="mb-4 flex items-center text-center">
                    <InputLabel for="estado" class="w-1/3" value="Estado" />
                    <div id="estado" class="block w-full w-2/3 px-3 py-2 border rounded-r border-gray-300">{{ animal.estado }}</div>
                </div>
                <div class="w-full w-2/3 flex justify-end">
                    <Link :href="route('animales.index')" class="bg-orange-600 text-white px-8 py-2 rounded">Regresar</Link>
                </div>

            </div>

        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link, usePage } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';
import { ref } from 'vue';

// Cargar la página actual y extraer los props
const page = usePage();
const animal = ref(page.props.animal);
const props = defineProps({
  animal: Object,
  razas: Array,
});
const formattedFecha = ref(page.props.formatted_fecha);
</script>
