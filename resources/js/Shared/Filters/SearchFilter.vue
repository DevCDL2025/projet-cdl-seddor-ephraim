<script setup>
import {ref, watch} from 'vue';
import { router } from '@inertiajs/vue3'
import {throttle} from "lodash/function.js";
import {trans} from "laravel-vue-i18n";

let props = defineProps({
    field_class: {
        type: String,
        default: 'input',
    },
    str_search: String,
    url: String
});

let search = ref(props.str_search)

watch(search, throttle(value => {
    router.get(props.url,{search:value},{
        preserveState: true,
        replace: true
    })
}, 1000))
</script>

<template>
    <div class="position-relative">
        <input
            type="text"
            class="form-control ps-4"
            v-model="search"
            :placeholder="trans('actions.search') + '...'"
        >
        <i class="ti ti-search position-absolute top-50 translate-middle-y start-0 ms-2"></i>
    </div>
</template>

