<script setup>
import {appRoute, userHasPermission} from "@/Helpers/Utils.js";
import {trans} from "laravel-vue-i18n";

defineProps({
    resource: Object,
    department: Object,
})
</script>

<template>
    <div class="dropdown">
        <button class="btn btn-sm btn-secondary dropdown-toggle drop-arrow-none" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ti ti-dots-vertical"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
            <Link
                v-if="userHasPermission('edit departments') && department.deleted_at === null"
                :href="appRoute('departments.edit', {id: department.id})"
                class="dropdown-item"
            >
                <i class="ti ti-pencil"></i> {{ trans("actions.edit") }}
            </Link>

            <Link
                v-if="userHasPermission('delete departments') && department.deleted_at === null"
                :href="appRoute('departments.delete', {id: department.id})"
                class="dropdown-item"
            >
                <i class="ti ti-trash"></i> {{ trans("actions.delete") }}
            </Link>
        </div>
    </div>
</template>


