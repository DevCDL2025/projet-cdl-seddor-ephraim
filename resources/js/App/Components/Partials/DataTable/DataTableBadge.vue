<script setup>
defineProps({
    color: String,
    content: String,
})
</script>

<template>
    <span class="h4">
        <span :class="[color, 'badge']">
            {{ content }}
        </span>
    </span>
</template>
