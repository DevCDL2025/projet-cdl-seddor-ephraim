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
    resource: Object,
})
</script>

<template>

    <Component
        v-if="userHasPermission('create ' + resource.plural_name)"
        :is="type === 'link' ? 'Link' : type"
        :href="url"
        class="btn btn-sm btn-success"
        v-bind="{ ...$attrs }"
        data-bs-toggle="tooltip"
        data-bs-placement="bottom"
        data-bs-title="Ajouter"
    >

        <i class="fas fa-plus" /> &nbsp;
        {{ trans('actions.add') + " " + resource.locale.name }}

    </Component>
</template>
