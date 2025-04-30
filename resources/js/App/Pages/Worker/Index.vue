<script setup>
  import HeadingLayout from "@/App/Layouts/HeadingLayout.vue";
  import BackOfficeCard from "@/App/Components/Partials/BackOfficeCard.vue";
  import DataTableFilters from "@/App/Components/Partials/DataTable/DataTableFilters.vue";
  import positionsFilter from "@/Shared/Filters/positionsFilter.vue";
  import CreateButtonLink from "@/App/Components/Partials/ActionButtons/CreateButtonLink.vue";
  import {appRoute, userHasPermission} from "@/Helpers/Utils.js";
  import BackOfficePagination from "@/App/Components/Partials/BackOfficePagination.vue";
  import DoctorInfoCard from "@/App/Pages/Doctor/Components/DoctorInfoCard.vue";
  import EditButtonLink from "@/App/Components/Partials/ActionButtons/EditButtonLink.vue";
  import DeleteButtonLink from "@/App/Components/Partials/ActionButtons/DeleteButtonLink.vue";
  import workerInfoCard from "@/App/Pages/worker/Components/workerInfoCard.vue";
  import PositionsFilter from "@/Shared/Filters/PositionsFilter.vue";

  defineProps({
      viewElements: Object,
      dataRows: Object,
      positions: Object,
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

        <div class="border border-dashed p-2 white rounded-2 card-body w-100 d-flex flex-wrap justify-content-between align-items-center gap-2">
            <data-table-filters
                :resource="viewElements.resource"
                :filtersToDisplay="['search', 'trashed']"
                :filters="filters"
                :queryString="queryString"
            >

                <positions-filter
                    :positions="positions"
                    :url="appRoute(viewElements.resource.plural_name + '.index', queryString)"
                />

            </data-table-filters>

            <create-button-link
                preserve-state
                preserve-scroll
                :url="appRoute(viewElements.resource.plural_name + '.create')"
                :resource="viewElements.resource"
            />
        </div>

        <div class="row mt-3">
            <div v-for="data in dataRows.data" class="col-12 col-md-4">
                <worker-info-card
                    :doctor="data"
                >
                    <div class="border-top text-center gap-1 hstack mt-2 pt-3">
                        <edit-button-link
                            v-if="userHasPermission('edit workers') && data.deleted_at === null"
                            preserve-state
                            preserve-scroll
                            :url="appRoute('workers.edit', {id: data.id})"
                            :resource="viewElements.resource"
                        />

                        <delete-button-link
                            v-if="userHasPermission('delete workers') && data.deleted_at === null"
                            preserve-state
                            preserve-scroll
                            :url="appRoute('workers.delete', {id: data.id})"
                            :resource="viewElements.resource"
                            type="button"
                        />
                    </div>
                </worker-info-card>
            </div>
        </div>

        <back-office-pagination
            :paginator="dataRows.meta"
            :links="dataRows.meta.links"
            :details="true"
        />

    </heading-layout>
</template>
