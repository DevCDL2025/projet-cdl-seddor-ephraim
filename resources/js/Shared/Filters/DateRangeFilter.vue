<script setup>

import {trans} from "laravel-vue-i18n";
import {ref, watch} from "vue";
import {throttle} from "lodash/function.js";
import {router} from "@inertiajs/vue3";

let props = defineProps({
    date_range: String,
    filter_name: String,
    url: String
});

let date_range = ref(null)
let filter_name = "filter[" + props.filter_name + "]"

watch(date_range, throttle(value => {
    let filter_value = value[0] + ', ' + value[1]

    router.get(props.url,{[filter_name]: filter_value},{
        preserveState: true,
        replace: true
    })
}, 1000))

</script>

<template>
    <div class="position-relative">
        <VueDatePicker
            v-model="date_range"
            model-type="yyyy-MM-dd"
            auto-apply
            :placeholder="trans('actions.filter_by') + ' ' + trans('validation.attributes.period')"
            :enable-time-picker="false"
            range multi-calendars
        />
    </div>
</template>

