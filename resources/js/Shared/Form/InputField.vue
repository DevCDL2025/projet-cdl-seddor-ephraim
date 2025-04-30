<script setup>
import { v4 as uuid } from 'uuid'

defineProps({
    id: {
        type: String,
        default() {
            return `text-input-${uuid()}`
        },
    },
    type: {
        type: String,
        default: 'text',
    },
    field_class: {
        type: String,
        default: 'form-control',
    },
    label_class: {
        type: String,
        default: 'form-label',
    },
    error: String,
    label: String,
    modelValue: [String, Number, Boolean],
})
</script>

<template>
    <div :class="[$attrs.class, 'mb-3']">
        <label v-if="label" :class="[label_class, 'mb-2 text-capitalize']" :for="id">
            {{ label }}

            <span v-if="$attrs.hasOwnProperty('required')" class="red-text">*</span>
        </label>
        <input
            :id="id"
            ref="input"
            v-bind="{ ...$attrs, class: null, label_class: null }"
            :class="[field_class, { 'field-error': error }]"
            :type="type"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
        />
        <div v-if="error" class="form-error">{{ error }}</div>
    </div>
</template>

