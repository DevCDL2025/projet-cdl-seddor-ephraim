<script setup>
defineProps({
    loading: Boolean
})
</script>

<template>
    <button :disabled="loading">
        <span v-if="loading" class="loader me-1" />
        <slot />
    </button>
</template>

