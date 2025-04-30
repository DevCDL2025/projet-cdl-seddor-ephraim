<script setup>
import HeadingLayout from "@/App/Layouts/HeadingLayout.vue";
import {appRoute} from "@/Helpers/Utils.js";
import CreateButtonLink from "@/App/Components/Partials/ActionButtons/CreateButtonLink.vue";
import BackOfficePagination from "@/App/Components/Partials/BackOfficePagination.vue";
import BackOfficeCard from "@/App/Components/Partials/BackOfficeCard.vue";
import DataTableFilters from "@/App/Components/Partials/DataTable/DataTableFilters.vue";
import DataTable from "@/App/Components/Partials/DataTable/DataTable.vue";
import DataTableActions from "@/App/Components/Partials/DataTable/DataTableActions.vue";

defineProps({
    viewElements: Object,
    dataTable: Object,
    filters: String,
    queryString: Object,
})
</script>

<template>
    <heading-layout
        :title="viewElements.title"
        :description="viewElements.description"
        :breadCrumbs="viewElements.breadCrumbs"
    >

        <back-office-card>
            <template #card_header>
                <data-table-filters
                    :resource="viewElements.resource"
                    :filtersToDisplay="['search', 'trashed']"
                    :filters="filters"
                    :queryString="queryString"
                />

                <create-button-link
                    preserve-state
                    preserve-scroll
                    :url="appRoute(viewElements.resource.plural_name + '.create')"
                    :resource="viewElements.resource"
                />
            </template>

            <div class="table-responsive">
                <data-table :columns="dataTable.columns">
                    <tr v-for="data in dataTable.rows.data" :key="data.id">
                        <td v-for="column in dataTable.columns">
                            {{ data[column.field] }}
                        </td>
                        <td class="pe-3">
                            <data-table-actions
                                :resource="viewElements.resource"
                                :route_param="{id: data.id}"
                                actions="['edit', 'delete', 'restore', 'force-delete']"
                                :isDeleted="data.deleted_at"
                            />
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

