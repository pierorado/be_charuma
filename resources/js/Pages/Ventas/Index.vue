<template>
    <Head title="Ventas" />

    <AuthenticatedLayout>


        <div class="container bg-white mx-auto">
        <div class="flex justify-between items-center bg-yellow-950 p-4">
            <h1 class="text-2xl font-normal text-white">Ventas</h1>
            <Link :href="route('ventas.create')" class="bg-orange-600 text-white px-8 py-2 rounded">Agregar</Link>
        </div>
        <div class="overflow-x-auto bg-white mt-4 px-6">
            <table class="min-w-full divide-y divide-gray-200 border border-gray-200">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-center font-medium border-r border-gray-200">Arete</th>
                        <th class="px-6 py-3 text-center font-medium border-r border-gray-200">Nombre</th>
                        <th class="px-6 py-3 text-center font-medium border-r border-gray-200">Fecha</th>
                        <th class="px-6 py-3 text-center font-medium  border-r border-gray-200">Propietario</th>
                        <th class="px-6 py-3 text-center font-medium border-r border-gray-200">Precio</th>
                        <th class="px-6 py-3 text-center font-medium border-r border-gray-200">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr v-for="venta in ventas.data" :key="venta.id_venta ">
                        <td class="px-6 py-2 text-center border-r border-gray-200">{{ venta.animal.arete }}</td>
                        <td class="px-6 py-2 text-center border-r border-gray-200">{{ venta.animal.nombre_animal }}</td>
                        <td class="px-6 py-2 text-center border-r border-gray-200">{{ formatDate(venta.fecha) }}</td>
                        <td class="px-6 py-2 text-center border-r border-gray-200">{{ venta.nombre_propietario }}</td>
                        <td class="px-6 py-2 text-center border-r border-gray-200">{{ venta.precio }}</td>
                        <td class="px-6 py-2 text-center border-r border-gray-200">

                            <Link :href="route('ventas.show', venta.id_venta)" class="bg-green-500 text-white px-2 py-1 rounded mr-2 items-center inline-flex">
                                <svg width="14" height="12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.34.75c-1.823 0-3.283.863-4.346 1.89C1.937 3.655 1.23 4.874.897 5.711a.772.772 0 0 0 0 .576c.334.837 1.04 2.056 2.097 3.073 1.063 1.026 2.523 1.889 4.346 1.889 1.824 0 3.284-.863 4.347-1.89 1.057-1.019 1.763-2.235 2.1-3.072a.772.772 0 0 0 0-.576c-.337-.837-1.043-2.056-2.1-3.073C10.624 1.613 9.164.75 7.341.75ZM4.09 6c0-.895.343-1.754.952-2.386a3.19 3.19 0 0 1 2.298-.989 3.19 3.19 0 0 1 2.299.989c.61.632.952 1.49.952 2.386 0 .895-.343 1.754-.952 2.386a3.19 3.19 0 0 1-2.298.989 3.19 3.19 0 0 1-2.299-.989A3.442 3.442 0 0 1 4.09 6Zm3.25-1.5c0 .827-.647 1.5-1.444 1.5-.16 0-.314-.028-.458-.077-.124-.043-.269.037-.264.173.007.162.03.324.072.485.31 1.2 1.499 1.913 2.654 1.592 1.156-.321 1.842-1.557 1.533-2.757-.25-.972-1.08-1.626-2-1.666-.13-.005-.208.143-.167.274.047.15.074.31.074.476Z" fill="#fff"/>
                                </svg>
                            </Link>
                            <Link :href="route('ventas.edit', venta.id_venta)" class="bg-blue-500 text-white px-2 py-1 rounded mr-2 items-center inline-flex">
                                <svg width="14" height="12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m11.26 5.421.287-.265-.861-.794-1.577-1.456-.86-.794-.287.265-.574.53L2.33 7.574a2.052 2.052 0 0 0-.564.877l-.899 2.822a.527.527 0 0 0 .155.555c.16.145.389.2.602.143l3.055-.83c.358-.098.685-.276.95-.52l5.057-4.669.574-.532ZM4.905 9.368l-.231.532a1.104 1.104 0 0 1-.338.162L2.35 10.6l.584-1.83a.877.877 0 0 1 .175-.312l.577-.213v.75c0 .206.183.375.406.375h.813v-.003ZM10.05.446l-.365.34-.574.529-.29.265.861.794L11.26 3.83l.86.794.288-.264.573-.53.369-.34a1.42 1.42 0 0 0 0-2.121l-.998-.923a1.722 1.722 0 0 0-2.298 0h-.003ZM8.848 4.383 5.19 7.758a.432.432 0 0 1-.573 0 .356.356 0 0 1 0-.53l3.656-3.375a.432.432 0 0 1 .574 0 .356.356 0 0 1 0 .53Z" fill="#fff"/>
                                </svg>
                            </Link>
                            <Link @success="onDeleteSuccess" :href="route('ventas.destroy', venta.id_venta)" method="delete" as="button" class="bg-red-500 text-white px-2 py-1 rounded">
                                <svg width="14" height="12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m4.749.415-.21.335H1.755c-.514 0-.929.335-.929.75s.415.75.929.75h11.143c.514 0 .928-.335.928-.75s-.414-.75-.928-.75H10.11L9.902.415C9.746.159 9.423 0 9.072 0H5.58c-.352 0-.674.16-.83.415ZM12.897 3H1.754l.615 7.945c.047.593.656 1.055 1.39 1.055h7.133c.734 0 1.343-.462 1.39-1.055L12.897 3Z" fill="#fff"/>
                                </svg>
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="flex flex-col items-center bg-white px-5 py-5 xs:flex-row xs:justify-between">
                <pagination :links="ventas.links" />
        </div>
    </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

const page = usePage();
const ventas = ref(page.props.ventas);

const onDeleteSuccess = (e) => {
    ventas.value = e.props.ventas;
}
// Función para formatear fechas
const formatDate = (dateString) => {
  const options = { day: '2-digit', month: '2-digit', year: 'numeric' };
  return new Date(dateString).toLocaleDateString('es-ES', options);
};
</script>
