<script setup>
defineProps(['value']);
</script>

<template>
    <label class="block font-medium text-sm text-black-700 dark:text-black-300">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
