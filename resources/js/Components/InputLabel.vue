<template>
    <label class="text-gray-700 bg-slate-100 border p-2 rounded-l border-gray-300">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>

<script setup>
defineProps(['value']);
</script>
