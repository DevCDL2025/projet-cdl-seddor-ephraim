<script setup>
import {trans} from "laravel-vue-i18n";
import {userHasPermission} from "@/Helpers/Utils.js";
import {useForm} from "@inertiajs/vue3";

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
})

const form = useForm({})

let confirmDeletion = () => {
    Swal.mixin({
        buttonsStyling: true
    }).fire({
        title: trans('messages.are_you_sure'),
        text: trans('messages.are_you_sure_you_want_to_delete_this_data'),
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: trans("actions.yes_delete"),
        cancelButtonText: trans('actions.cancel')
    }).then((result) => {
        if (result.isConfirmed) {
            form.delete(props.url)
        }

        else {
            return false;
        }
    })
}

</script>

<template>
    <Component
        v-if="userHasPermission('delete ' + resource.plural_name)"
        :is="type === 'link' ? 'Link' : type"
        :href="url"
        class="btn btn-sm btn-danger"
        v-bind="{ ...$attrs }"
        data-bs-toggle="tooltip"
        data-bs-placement="bottom"
        data-bs-title="Supprimer"
        @click="confirmDeletion"
    >

        <i class="fas fa-trash-alt" v-if="!withText" />

        <span v-else class="flex items-center justify-center">
            <span class="text-lg">
                <i class="ti ti-trash" />
            </span>
            <span class="ltr:ml-1 rtl:mr-1">{{ trans('actions.delete') }}</span>
        </span>
    </Component>
</template>
