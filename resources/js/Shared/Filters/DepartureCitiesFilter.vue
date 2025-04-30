<script setup>
import {trans, trans_choice} from "laravel-vue-i18n";
import {ref, watch} from "vue";
import {router} from "@inertiajs/vue3";
import SelectField from "@/Shared/Form/SelectField.vue";

let props = defineProps({
    cities: Object,
    filter_name: {
        type: String,
        default: 'departure_city_code'
    },
    url: String,
    byDefault: {
        type: String,
        default: "all"
    }
})

let selected_city = ref(props.byDefault)
let filter_name = "filter[" + props.filter_name + "]"

watch(selected_city, value => {
    router.get(props.url,{[filter_name]: (value === 'all') ? null : value},{
        preserveState: true,
        replace: true
    })
})
</script>

<template>
    <select-field
        v-model="selected_city"
        :label="trans('actions.filter_by') + ' ' + trans_choice('validation.attributes.departure_city', 2)"
    >
        <option value="all" selected>{{ trans('usuals.expression.all') }}</option>
        <option v-for="data in cities" :key="data.id" :value="data.code">{{ data.name }}</option>
    </select-field>
</template>

