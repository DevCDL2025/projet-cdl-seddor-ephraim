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
    }
})
</script>

<template>
    <Component
        v-if="userHasPermission('edit ' + resource.plural_name)"
        :is="type === 'link' ? 'Link' : type"
        :href="url"
        class="btn btn-sm btn-warning black-text"
        v-bind="{ ...$attrs }"
        data-bs-toggle="tooltip"
        data-bs-placement="bottom"
        data-bs-title="Editer"
    >

        <i class="fas fa-pencil-alt" v-if="!withText" />

        <span v-else>
            <span class="ltr:ml-1 rtl:mr-1">
                <i class="fas fa-pencil-alt" />
                {{ trans('actions.edit') }}
            </span>
        </span>
    </Component>
</template>
