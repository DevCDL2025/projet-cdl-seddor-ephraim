<script setup>
import { Head } from '@inertiajs/vue3'

defineProps({
    title: String,
    description: String,
});
</script>

<template>
    <Head>
        <title>{{ title ? title : '' }}</title>
        <meta
            type="description"
            :content="description ? description : ''"
            head-key="description"
        >
    </Head>
</template>

