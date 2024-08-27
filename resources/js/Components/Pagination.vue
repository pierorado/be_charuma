<template>
  <div v-if="links.length > 3">
    <div class="flex flex-wrap -mb-1">
      <template v-for="(link, key) in links">
        <div v-if="link.url === null" :key="key" class="px-2 py-1 mb-1 text-sm leading-4 text-gray-400 border" v-html="translateLabel(link.label)" />

        <Link v-else :key="key + 1" class="px-2 py-1 mb-1 text-sm leading-4 border hover:bg-orange-600 hover:text-white" :class="{ 'text-white bg-orange-600': link.active }" :href="link.url" v-html="translateLabel(link.label)" />
      </template>
    </div>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
  links: Array,
});
// Función para traducir los labels de los botones de paginación
function translateLabel(label) {
  if (label.includes('Previous')) {
    return label.replace('Previous', 'Anterior');
  } else if (label.includes('Next')) {
    return label.replace('Next', 'Siguiente');
  } else {
    return label;
  }
}
</script>
