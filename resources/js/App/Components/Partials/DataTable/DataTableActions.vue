<script setup>
import DeleteButtonLink from "@/App/Components/Partials/ActionButtons/DeleteButtonLink.vue";
import {appRoute} from "@/Helpers/Utils.js";
import EditButtonLink from "@/App/Components/Partials/ActionButtons/EditButtonLink.vue";
import RestoreButtonLink from "@/App/Components/Partials/ActionButtons/RestoreButtonLink.vue";
import ForceDeleteButtonLink from "@/App/Components/Partials/ActionButtons/ForceDeleteButtonLink.vue";
import ShowButtonLink from "@/App/Components/Partials/ActionButtons/ShowButtonLink.vue";

defineProps({
    resource: Object,
    route_param: {
        type: Object,
        default: {
            param: String,
            value: String
        }
    },
    actions: {
        type: String,
        default: null
    },
    isDeleted: {
        type: String,
        default: null
    },
})
</script>

<template>
    <div class="d-flex justify-content-center align-items-center gap-1">
        <slot />

        <show-button-link
            v-if="actions.includes('show') && isDeleted === null"
            preserve-state
            preserve-scroll
            :url="appRoute(resource.plural_name + '.show', route_param)"
            :resource="resource"
        />

        <edit-button-link
            v-if="actions.includes('edit') && isDeleted === null"
            preserve-state
            preserve-scroll
            :url="appRoute(resource.plural_name + '.edit', route_param)"
            :resource="resource"
        />

        <delete-button-link
            v-if="actions.includes('delete') && isDeleted === null"
            preserve-state
            preserve-scroll
            :url="appRoute(resource.plural_name + '.delete', route_param)"
            :resource="resource"
            type="button"
        />

        <restore-button-link
            v-if="actions.includes('restore') && isDeleted !== null"
            preserve-state
            preserve-scroll
            :url="appRoute(resource.plural_name + '.restore', route_param)"
            :resource="resource"
        />

        <force-delete-button-link
            v-if="actions.includes('force-delete') && isDeleted !== null"
            preserve-state
            preserve-scroll
            :url="appRoute(resource.plural_name + '.force-delete', route_param)"
            :resource="resource"
            type="button"
        />
    </div>
</template>

