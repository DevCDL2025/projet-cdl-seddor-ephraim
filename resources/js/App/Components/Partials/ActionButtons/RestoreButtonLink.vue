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
    withText: {
        type: Boolean,
        default: false
    },
})
</script>

<template>
    <Component
        v-if="userHasPermission('restore ' + resource.plural_name)"
        :is="type === 'link' ? 'Link' : type"
        :href="url"
        class="btn btn-sm deep-purple darken-3 rounded text-white"
        v-bind="{ ...$attrs }"
        data-bs-toggle="tooltip"
        data-bs-placement="bottom"
        data-bs-title="Restaurer"
    >

        <i class="fas fa-recycle" v-if="!withText" />

        <span v-else class="flex items-center justify-center">
            <span class="text-lg">
                <i class="fas fa-recycle" />
            </span>
            <span class="ltr:ml-1 rtl:mr-1">{{ trans('actions.restore') }}</span>
        </span>
    </Component>
</template>

