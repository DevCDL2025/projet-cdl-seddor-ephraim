<script setup>
import {trans} from "laravel-vue-i18n";
import {userHasPermission} from "@/Helpers/Utils.js";

defineProps({
    type: {
        type: String,
        default: "link",
    },
    url: {
        type: String,
        default: null
    },
    btn_class: {
        type: String,
    },
})
</script>

<template>

    <Component
        :is="type === 'link' ? 'Link' : type"
        :href="url"
        :class="[btn_class, 'btn']"
        v-bind="{ ...$attrs }"
    >

        <slot />

    </Component>
</template>
