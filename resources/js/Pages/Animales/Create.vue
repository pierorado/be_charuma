<template>
    <Head title="Añadir animales" />

    <AuthenticatedLayout>
        <div class="container bg-white mx-auto">
        <div class="flex justify-between items-center bg-yellow-950 p-4">
            <h1 class="text-2xl font-normal text-white">Añadir animales</h1>
        </div>
        <div class="overflow-x-auto bg-white py-5 px-6">

            <form @submit.prevent="submit">
            <div class="mb-4">
                <div class="flex items-center text-center">
                    <InputLabel for="arete" class="w-1/3" value="Arete" />
                    <TextInput id="arete" type="number" class="w-2/3" v-model="form.arete" autofocus />
                </div>
                <InputError class="mt-2" :message="form.errors.arete" />
            </div>
            <div class="mb-4 flex items-center text-center">
                <InputLabel for="ingreso" class="w-1/3" value="Ingreso" />
                <select id="ingreso" v-model="form.ingreso" class="block w-full w-2/3 px-3 py-2 border rounded-r border-gray-300">
                    <option value="Compra">Compra</option>
                    <option value="Nacimiento">Nacimiento</option>
                </select>
            </div>
            <div class="mb-4">
                <div class="flex items-center text-center">
                    <InputLabel for="nombre_animal" class="w-1/3" value="Nombre" />
                    <TextInput id="nombre_animal" type="text" class="w-2/3" v-model="form.nombre_animal" autofocus />
                </div>
                <InputError class="mt-2" :message="form.errors.nombre_animal" />
            </div>
            <div class="mb-4 flex items-center text-center">
                <InputLabel for="sexo" class="w-1/3" value="Sexo" />
                <select id="sexo" v-model="form.sexo" class="block w-full w-2/3 px-3 py-2 border rounded-r border-gray-300">
                    <option value="Hembra">Hembra</option>
                    <option value="Macho">Macho</option>
                </select>
            </div>
            <div class="mb-4 flex items-center text-center">
                <InputLabel for="raza_id" class="w-1/3" value="Raza" />
                <select id="raza_id" v-model="form.raza_id" class="block w-full w-2/3 px-3 py-2 border rounded-r border-gray-300">
                    <option v-for="raza in razas" :key="raza.id_raza" :value="raza.id_raza">
                        {{ raza.nombre_raza }}
                    </option>
                </select>
            </div>
            <div class="mb-4">
                <div class="flex items-center text-center">
                    <InputLabel for="fecha" class="w-1/3" value="Fecha" />
                    <TextInput id="fecha" type="date" class="w-2/3" v-model="form.fecha" autofocus />
                </div>
                <InputError class="mt-2" :message="form.errors.fecha" />
            </div>
            <div class="mb-4 flex items-center text-center">
                <InputLabel for="clasificacion" class="w-1/3" value="Clasificación" />
                <select id="clasificacion" v-model="form.clasificacion" class="block w-full w-2/3 px-3 py-2 border rounded-r border-gray-300">
                    <option value="Vacas">Vaca</option>
                    <option value="Toros">Toro</option>
                    <option value="Terneros">Terneros</option>
                    <option value="Terneras">Terneras</option>
                    <option value="Vaquillonas">Vaquillonas</option>
                </select>
            </div>
            <div class="mb-4" v-if="form.ingreso === 'Compra'">
                <div class="flex items-center text-center">
                    <InputLabel for="precio_compra" class="w-1/3" value="Precio de compra" />
                    <TextInput id="precio_compra" type="number" class="w-2/3" v-model="form.precio_compra" autofocus />
                </div>
                 <InputError class="mt-2" :message="form.errors.precio_compra" />
            </div>
            <div class="mb-4 flex items-center text-center">
                <InputLabel for="estado" class="w-1/3" value="Estado" />
                <select id="estado" v-model="form.estado" name="estado" class="block w-full w-2/3 px-3 py-2 border rounded-r border-gray-300">
                    <option value="Activo">Activo</option>
                    <option value="Muerto">Muerto</option>
                    <option value="Vendido">Vendido</option>
                </select>
            </div>
            <div class="mb-4 flex justify-between items-center">
                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                <div v-if="form.recentlySuccessful"  class="w-1/3 flex justify-center bg-green-200 px-4 py-2 rounded">
                    <svg viewBox="0 0 24 24" class="text-green-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
                        <path fill="currentColor" d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
                        </path>
                    </svg>
                    <span class="text-green-800">Animal guardado</span>
                </div>
                </Transition>
                <div class="w-full w-2/3 flex justify-end">
                    <PrimaryButton>Guardar</PrimaryButton>
                </div>

            </div>

        </form>

        </div>

    </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link, useForm } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
const props = defineProps({
  razas: Array,
});

const form = useForm({
            arete: '',
            ingreso: 'Nacimiento',
            nombre_animal: '',
            fecha: '',
            sexo: '',
            clasificacion: 'Vacas',
            precio_compra: '',
            estado: 'Activo',
            raza_id: props.razas.length > 0 ? props.razas[0].id_raza : '',
        });
const submit = () =>{
    form.post(route('animales.store'),{
        onSuccess: (e) => {
            animal.value = e.props.animal;

        }
    });
}
</script>
