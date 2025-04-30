<script setup>
import {trans} from "laravel-vue-i18n";

defineProps({
    display: {
        type: Boolean,
        default: false
    }
})
</script>

<template>
    <div
        v-if="display"
        class="rgba-red-slight red-text form-error-notice px-3"
    >
        {{ trans('messages.please_check_this_errors') }}
    </div>
</template>

