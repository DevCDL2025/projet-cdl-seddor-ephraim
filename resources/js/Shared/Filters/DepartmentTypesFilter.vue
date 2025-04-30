<script setup>
import {trans, trans_choice} from "laravel-vue-i18n";
import {ref, watch} from "vue";
import {router} from "@inertiajs/vue3";
import SelectField from "@/Shared/Form/SelectField.vue";

let props = defineProps({
    types: Object,
    filter_name: {
        type: String,
        default: 'department_type_code'
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
        :label="trans('actions.filter_by') + ' ' + trans_choice('displays.resource.department-type', 2)"
    >
        <option value="all" selected>{{ trans('usuals.expression.all') }}</option>
        <option v-for="data in types" :key="data.id" :value="data.code">{{ data.label }}</option>
    </select-field>
</template>

