<template>
    <input class="block w-full px-3 py-2 border rounded-r border-gray-300 form-input focus:border-indigo-600" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input">
</template>

<script setup>
import { onMounted, ref } from 'vue';

defineProps(['modelValue']);

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});
</script>
