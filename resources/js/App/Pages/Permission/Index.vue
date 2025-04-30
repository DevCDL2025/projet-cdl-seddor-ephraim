<script setup>
import HeadingLayout from "@/App/Layouts/HeadingLayout.vue";
import {ref} from "vue";
import PermissionForm from "@/App/Pages/Permission/Components/PermissionForm.vue";
import EditButtonLink from "@/App/Components/Partials/ActionButtons/EditButtonLink.vue";
import BackOfficePagination from "@/App/Components/Partials/BackOfficePagination.vue";
import BackOfficeCard from "@/App/Components/Partials/BackOfficeCard.vue";
import DataTableFilters from "@/App/Components/Partials/DataTable/DataTableFilters.vue";
import DataTable from "@/App/Components/Partials/DataTable/DataTable.vue";
import DataTableActions from "@/App/Components/Partials/DataTable/DataTableActions.vue";

defineProps({
    viewElements: Object,
    dataTable: Object,
    filters: String,
    formSchema: Object,
    queryString: Object,
})

const formDialog = ref(null)

const openFormDialog = (data = null) => {
    formDialog.value.openForm(data)
}

</script>

<template>
    <heading-layout
        :title="viewElements.title"
        :description="viewElements.description"
        :breadCrumbs="viewElements.breadCrumbs"
    >

        <PermissionForm
            ref="formDialog"
            :resource="viewElements.resource"
            :formSchema="formSchema"
        />

        <back-office-card>
            <template #card_header>
                <data-table-filters
                    :resource="viewElements.resource"
                    :filtersToDisplay="['search', 'trashed']"
                    :filters="filters"
                    :queryString="queryString"
                />
            </template>

            <div class="table-responsive">
                <data-table :columns="dataTable.columns">
                    <tr v-for="data in dataTable.rows.data" :key="data.id">
                        <td v-for="column in dataTable.columns">
                            {{ data[column.field] }}
                        </td>
                        <td>
                            <data-table-actions
                                :resource="viewElements.resource"
                                :route_param="{id: data.id}"
                                actions=""
                                :isDeleted="data.deleted_at"
                            >

                                <edit-button-link
                                    v-if="data.deleted_at === null"
                                    @click.prevent="openFormDialog(data)"
                                    preserve-state
                                    preserve-scroll
                                    type="button"
                                    :resource="viewElements.resource"
                                />

                            </data-table-actions>
                        </td>
                    </tr>
                </data-table>

                <back-office-pagination
                    :paginator="dataTable.rows.meta"
                    :links="dataTable.rows.links"
                    :details="true"
                />
            </div>
        </back-office-card>

    </heading-layout>
</template>
