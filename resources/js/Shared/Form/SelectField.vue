
<script>
import { v4 as uuid } from 'uuid'

export default {
    inheritAttrs: false,
    props: {
        id: {
            type: String,
            default() {
                return `select-input-${uuid()}`
            },
        },
        field_class: {
            type: String,
            default: 'form-control',
        },
        error: String,
        label: String,
        modelValue: [String, Number, Boolean, Array],
        label_class: {
            type: String,
            default: 'form-label',
        },
    },
    emits: ['update:modelValue'],
    data() {
        return {
            selected: this.modelValue,
        }
    },
    watch: {
        selected(selected) {
            this.$emit('update:modelValue', selected)
        },
    },
    methods: {
        focus() {
            this.$refs.input.focus()
        },
        select() {
            this.$refs.input.select()
        },
    },
}
</script>


<template>
    <div :class="[$attrs.class, 'mb-3']">
        <label v-if="label" :class="[label_class, 'mb-2 text-capitalize']" :for="id">
            {{ label }}

            <span v-if="$attrs.hasOwnProperty('required')" class="red-text">*</span>
        </label>
        <select
            :id="id"
            ref="input"
            v-bind="{ ...$attrs, class: null }"
            :class="[field_class, { 'field-error': error }]"
            v-model="selected"
        >
            <slot />
        </select>
        <div v-if="error" class="form-error">{{ error }}</div>
    </div>
</template>

