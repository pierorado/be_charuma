<template>
    <Head title="Detalles del gestante" />

    <AuthenticatedLayout>
        <div class="container bg-white mx-auto">
            <div class="flex justify-between items-center bg-yellow-950 p-4">
                <h1 class="text-2xl font-normal text-white">Detalles del gestante</h1>
            </div>
            <div class="overflow-x-auto bg-white py-5 px-6" v-if="gestante">

                <div class="mb-4">
                    <div class="flex items-center text-center">
                        <InputLabel for="arete" class="w-1/3" value="Arete" />
                        <div id="arete" class="block w-full w-2/3 px-3 py-2 border rounded-r border-gray-300">{{gestante.animal.arete }}</div>
                    </div>
                </div>

                <div class="mb-4 flex items-center text-center">
                    <InputLabel for="nombre" class="w-1/3" value="Nombre" />
                    <div id="nombre" class="block w-full w-2/3 px-3 py-2 border rounded-r border-gray-300">{{ gestante.animal.nombre_animal }}</div>
                </div>

                <div class="mb-4">
                    <div class="flex items-center text-center">
                        <InputLabel for="Fecha_prenez" class="w-1/3" value="Fecha de preñez" />
                        <div id="Fecha_prenez" class="block w-full w-2/3 px-3 py-2 border rounded-r border-gray-300">{{ prenezFecha }}</div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="flex items-center text-center">
                        <InputLabel for="Fecha_estimada" class="w-1/3" value="Fecha de estimada" />
                        <div id="Fecha_estimada" class="block w-full w-2/3 px-3 py-2 border rounded-r border-gray-300">{{ estimadaFecha }}</div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="flex items-center text-center">
                        <InputLabel for="Fecha_parto" class="w-1/3" value="Fecha de parto" />
                        <div id="Fecha_parto" class="block w-full w-2/3 px-3 py-2 border rounded-r border-gray-300">{{ partoFecha }}</div>
                    </div>
                </div>

                <div class="mb-4 flex items-center text-center">
                    <InputLabel for="crias" class="w-1/3" value="Crias" />
                    <div id="crias" class="block w-full w-2/3 px-3 py-2 border rounded-r border-gray-300">{{ gestante.crias }}</div>
                </div>
                <div class="w-full w-2/3 flex justify-end">
                    <Link :href="route('gestantes.index')" class="bg-orange-600 text-white px-8 py-2 rounded">Regresar</Link>
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
const gestante = ref(page.props.gestante);
const props = defineProps({
    gestante: Object,
    animales: Array,
});
const prenezFecha = ref(page.props.prenez_fecha);
const estimadaFecha = ref(page.props.estimada_fecha);
const partoFecha = ref(page.props.parto_fecha);
</script>
