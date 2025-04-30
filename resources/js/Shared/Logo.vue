<script setup>
import { asset, appData } from '@/Helpers/Utils.js';

defineProps({
    type: {
        type: String,
        default: "color"
    }
})

</script>

<template>
    <h3>{{ appData('name') }}</h3>
</template>

