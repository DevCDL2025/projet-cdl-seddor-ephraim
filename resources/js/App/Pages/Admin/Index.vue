<script setup>
import HeadingLayout from "@/App/Layouts/HeadingLayout.vue";
import {appRoute, authData, authUserIsInAgency} from "@/Helpers/Utils.js";
import CreateButtonLink from "@/App/Components/Partials/ActionButtons/CreateButtonLink.vue";
import BackOfficePagination from "@/App/Components/Partials/BackOfficePagination.vue";
import BackOfficeCard from "@/App/Components/Partials/BackOfficeCard.vue";
import RolesFilter from "@/Shared/Filters/RolesFilter.vue";
import DataTableFilters from "@/App/Components/Partials/DataTable/DataTableFilters.vue";
import DataTable from "@/App/Components/Partials/DataTable/DataTable.vue";
import DataTableActions from "@/App/Components/Partials/DataTable/DataTableActions.vue";
import DataTableBadge from "@/App/Components/Partials/DataTable/DataTableBadge.vue";
import {ROLES_BADGE_COLOR} from "@/Helpers/Constants.js";

let props = defineProps({
    viewElements: Object,
    dataTable: Object,
    filters: String,
    queryString: Object,
    roles: Object,
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
                    <RolesFilter
                        :roles="roles"
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
                            <img v-if="column.field === 'avatar'" width="32" :src="data['avatar']" loading="lazy" alt="">
                            <a v-else-if="column.field === 'email'" class="underline" :href="'mailto:' + data[column.field]">{{ data[column.field] }}</a>
                            <span v-else-if="column.field === 'name'">{{ data["full_name"] }}</span>
                            <data-table-badge
                                v-else-if="column.field === 'role'"
                                :color="ROLES_BADGE_COLOR"
                                :content="data['role']['label']"
                            />

                            <span v-else>{{ data[column.field] }}</span>
                        </td>
                        <td>
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
                    :links="dataTable.rows.meta.links"
                    :details="true"
                />
            </div>
        </back-office-card>
    </heading-layout>
</template>

