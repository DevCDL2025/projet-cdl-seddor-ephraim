<script setup>
defineProps({
    label: String,
    label_class: {
        type: String,
        default: 'form-label',
    },
    isRequired: {
        type: Boolean,
        default: false,
    },
    forId: {
        type: [String, Number],
        default: null
    }
})
</script>

<template>
    <label v-if="label" :class="[label_class, 'mb-2 text-capitalize']" :for="forId">
        {{ label }}

        <span v-if="isRequired" class="red-text">*</span>
    </label>
</template>

