<script setup>
import {ref} from "vue";
import ActionButtonLink from "@/App/Components/Partials/ActionButtons/ActionButtonLink.vue";
import StatusManagerForm from "@/App/Components/Partials/StatusManager/StatusManagerForm.vue";
import {userHasPermission} from "@/Helpers/Utils.js";

let props = defineProps({
    resource: Object,
    status: Object,
    resource_data: Object,
    permission: {
        type: String,
        default: "manage-status",
    }
})

let permissionToCheck = (props.permission !== "") ? props.permission : 'edit ' + props.resource.plural_name;

const statusDialog = ref(null)

const openStatusDialog = (data = null) => {
    statusDialog.value.openForm(data)
}
</script>

<template>

    <status-manager-form
        ref="statusDialog"
        :status="status"
        :resource="resource"
        :route_param="{id: resource_data.id}"
    />

    <action-button-link
        v-if="userHasPermission(permissionToCheck)"
        type="button"
        class="btn-sm deep-purple darken-2 white-text"
        @click.prevent="openStatusDialog(resource_data)"
        preserve-state
        preserve-scroll
        data-bs-toggle="tooltip"
        data-bs-placement="bottom"
        data-bs-title="Changer Statut"
    >
        <i class="ti ti-adjustments"></i>
    </action-button-link>
</template>

