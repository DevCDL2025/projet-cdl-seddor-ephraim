<script setup>
import SeoTags from "@/Shared/SeoTags.vue";
import {appRoute} from "@/Helpers/Utils.js";

let props = defineProps({
    title: String,
    description: String,
    resource: {
        type: Object,
        default: null
    },
    action: {
        type: Object,
        default: null,
    },
    breadCrumbs: {
        type: Object,
        default: null,
    },
})

const lastElement = (props.breadCrumbs !== null) ? props.breadCrumbs.pop() : null;

</script>

<template>
    <div>
        <seo-tags
            :title="title"
            :description="description"
        />

        <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
            <div class="flex-grow-1">
                <h4 v-if="action !== null" class="fs-18 fw-semibold mb-0">
                    <Link
                        :href="appRoute(resource.plural_name + '.index')"
                        class="text-decoration-underline blue-text text-darken-4"
                    >
                        {{ resource !== null ? resource.locale.plural_name : title }}
                    </Link>

                    | <span class="h4 fw-bold"> {{ action.locale }}</span>
                </h4>

                <h4 v-else class="fs-18 fw-semibold mb-0">
                    {{ resource !== null ? resource.locale.plural_name : title }}
                </h4>
            </div>

            <div v-if="breadCrumbs !== null" class="text-end">
                <ol v-if="breadCrumbs" class="breadcrumb m-0 py-0">
                    <li v-for="item in breadCrumbs"
                        class="breadcrumb-item">
                        <Link v-if="item.url" :href="item.url">{{ item.title }}</Link>
                    </li>

                    <li class="breadcrumb-item active">{{ lastElement.title }}</li>
                </ol>
            </div>
        </div>

        <slot />
    </div>
</template>

