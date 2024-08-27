<template>
    <button :type="type" class="bg-orange-600 text-white px-8 py-2 rounded hover:bg-orange-500">
        <slot />
    </button>
</template>

<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>
