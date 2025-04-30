<script setup>
import SearchFilter from "@/Shared/Filters/SearchFilter.vue";
import StatusFilter from "@/Shared/Filters/StatusFilter.vue";
import TrashedFilter from "@/Shared/Filters/TrashedFilter.vue";
import {appRoute} from "@/Helpers/Utils.js";

let props = defineProps({
    resource: Object,
    filtersToDisplay: Array,
    status: Object,
    dataTable: Object,
    filters: String,
    queryString: Object,
    url: {
        type: String,
        default: null,
    }
})

let filterUrl = (props.url !== null) ? props.url : appRoute(props.resource.plural_name + '.index', props.queryString);

</script>

<template>
    <div class="d-flex flex-wrap flex-lg-nowrap gap-2">
        <div class="flex-shrink-0 d-flex align-items-center gap-2">
            <SearchFilter
                class="mt-1"
                v-if="filtersToDisplay.includes('search')"
                :str_search="filters !== null ? filters : null"
                :url="filterUrl"
            />

            <StatusFilter
                v-if="filtersToDisplay.includes('status')"
                :status="status"
                :url="filterUrl"
            />

            <TrashedFilter
                v-if="filtersToDisplay.includes('trashed')"
                :url="filterUrl"
            />

            <slot />
        </div>
    </div>
</template>

