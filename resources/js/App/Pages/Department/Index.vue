<script setup>
import HeadingLayout from "@/App/Layouts/HeadingLayout.vue";
import BackOfficeCard from "@/App/Components/Partials/BackOfficeCard.vue";
import DataTableFilters from "@/App/Components/Partials/DataTable/DataTableFilters.vue";
import CreateButtonLink from "@/App/Components/Partials/ActionButtons/CreateButtonLink.vue";
import DepartmentTypesFilter from "@/Shared/Filters/DepartmentTypesFilter.vue";
import {appRoute} from "@/Helpers/Utils.js";
import DataTable from "@/App/Components/Partials/DataTable/DataTable.vue";
import BackOfficePagination from "@/App/Components/Partials/BackOfficePagination.vue";
import DataTableBadge from "@/App/Components/Partials/DataTable/DataTableBadge.vue";
import {COUNT_BADGE_COLOR, DEPARTMENT_TYPES_BADGE_COLOR} from "@/Helpers/Constants.js";
import {trans_choice} from "laravel-vue-i18n";
import DepartmentActionLinks from "@/App/Pages/Department/Components/DepartmentActionLinks.vue";

defineProps({
    viewElements: Object,
    dataTable: Object,
    departmentTypes: Object,
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
                >

                    <department-types-filter
                        :types="departmentTypes"
                        :url="appRoute(viewElements.resource.plural_name + '.index', queryString)"
                    />

                </data-table-filters>

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
                            <data-table-badge
                                v-if="column.field === 'department_type'"
                                :color="DEPARTMENT_TYPES_BADGE_COLOR"
                                :content="data['department_type']"
                            />
                            <data-table-badge
                                v-else-if="column.field === 'count'"
                                :color="COUNT_BADGE_COLOR"
                                :content="data['count']['specialities'] + ' '+ trans_choice('displays.resource.speciality', 2) +  ' - ' + data['count']['staffs'] + ' '+ trans_choice('displays.resource.staff', 2)"
                            />
                            <span v-else>{{ data[column.field] }}</span>
                        </td>
                        <td class="pe-3">
                            <department-action-links
                                :resource="viewElements.resource"
                                :department="data"
                            />
                        </td>
                    </tr>
                </data-table>

                <back-office-pagination
                    :paginator="dataTable.rows.meta"
                    :links="dataTable.rows.meta.links"
                    :details="true"
                />
            </div>

        </back-office-card>
    </heading-layout>
</template>
