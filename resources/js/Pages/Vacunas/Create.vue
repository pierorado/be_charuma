<template>
    <Head title="Añadir Vacunas" />

    <AuthenticatedLayout>
        <div class="container bg-white mx-auto">
        <div class="flex justify-between items-center bg-yellow-950 p-4">
            <h1 class="text-2xl font-normal text-white">Añadir Vacunas</h1>
        </div>
        <div class="overflow-x-auto bg-white py-5 px-6">

            <form @submit.prevent="submit">

            <div class="mb-4 flex items-center text-center">
                <InputLabel for="animal_id" class="w-1/3" value="Arete" />
                <select id="animal_id" v-model="form.animal_id" class="block w-full w-2/3 px-3 py-2 border rounded-r border-gray-300">
                    <option v-for="animal in animales" :key="animal.id_animal" :value="animal.id_animal">
                        {{ animal.arete }}
                    </option>
                </select>
            </div>

            <div class="mb-4">
                <div class="flex items-center">
                <InputLabel class="w-1/3  text-center" value="Nombre del Animal" />
                <div class="block w-full w-2/3 px-3 py-2 bg-slate-100 border rounded-r border-gray-300">
                    {{ selectedAnimal.nombre_animal }}
                </div>
                </div>
            </div>

            <div class="mb-4">
                <div class="flex items-center text-center">
                    <InputLabel for="crias" class="w-1/3" value="Vacuna" />
                    <TextInput id="crias" type="text" class="w-2/3" v-model="form.nombre_vacuna" autofocus />
                </div>
                 <InputError class="mt-2" :message="form.errors.nombre_vacuna" />
            </div>

            <div class="mb-4">
                <div class="flex items-center text-center">
                    <InputLabel for="Fecha_administrada" class="w-1/3" value="Fecha de administrada" />
                    <TextInput id="Fecha_administrada" type="date" class="w-2/3" v-model="form.Fecha_administrada" autofocus />
                </div>
                <InputError class="mt-2" :message="form.errors.Fecha_administrada" />
            </div>

            <div class="mb-4">
                <div class="flex items-center text-center">
                    <InputLabel for="Fecha_programada" class="w-1/3" value="Fecha de programada" />
                    <TextInput id="Fecha_programada" type="date" class="w-2/3" v-model="form.Fecha_programada" autofocus />
                </div>
                <InputError class="mt-2" :message="form.errors.Fecha_programada" />
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
                    <span class="text-green-800">Gestante guardado</span>
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
import { computed, watch } from 'vue';
const props = defineProps({
  animales: Array,
});

const form = useForm({
            nombre_vacuna: '',
            Fecha_administrada: '',
            Fecha_programada: '',
            animal_id: props.animales.length > 0 ? props.animales[0].id_animal : '',
        });
const submit = () =>{
    form.post(route('vacunas.store'),{
        onSuccess: (e) => {
            vacuna.value = e.props.vacuna;

        }
    });
}
const selectedAnimal = computed(() => {
  return props.animales.find(animal => animal.id_animal === form.animal_id) || {};
});
// Watch para actualizar Fecha_estimada cuando cambie Fecha_prenez
watch(() => form.Fecha_administrada, (newFechaPrenez) => {
  if (newFechaPrenez) {
    const fechaPrenez = new Date(newFechaPrenez);
    fechaPrenez.setMonth(fechaPrenez.getMonth() + 12);
    form.Fecha_programada = fechaPrenez.toISOString().split('T')[0]; // Formato YYYY-MM-DD
  } else {
    form.Fecha_programada = '';
  }
});
</script>
