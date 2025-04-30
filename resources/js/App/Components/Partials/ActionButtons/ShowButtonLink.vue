<script setup>
import {trans} from "laravel-vue-i18n";
import {userHasPermission} from "@/Helpers/Utils.js";

let props = defineProps({
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
    permission: {
        type: String,
        default: null
    }
})

let permissionToCheck = (props.permission !== null) ? props.permission : 'view ' + props.resource.plural_name

</script>

<template>
    <Component
        v-if="userHasPermission(permissionToCheck)"
        :is="type === 'link' ? 'Link' : type"
        :href="url"
        class="btn btn-sm btn-info"
        v-bind="{ ...$attrs }"
        data-bs-toggle="tooltip"
        data-bs-placement="bottom"
        data-bs-title="Aperçu/Détails"
    >

        <i class="fas fa-info-circle" v-if="!withText" />

        <span v-else class="flex items-center justify-center">
            <span class="text-lg">
                <i class="fas fa-info-circle" v-if="!withText" />
            </span>
            <span class="ltr:ml-1 rtl:mr-1">{{ trans('actions.preview') }}</span>
        </span>
    </Component>
</template>
