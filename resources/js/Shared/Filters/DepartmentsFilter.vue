<script setup>
import {trans, trans_choice} from "laravel-vue-i18n";
import {ref, watch} from "vue";
import {router} from "@inertiajs/vue3";
import SelectField from "@/Shared/Form/SelectField.vue";

let props = defineProps({
    departments: Object,
    url: String,
    byDefault: {
        type: String,
        default: "all"
    }
})

let selected_department = ref(props.byDefault)

watch(selected_department, value => {
    router.get(props.url,{'filter[department_code]': (value === 'all') ? null : value},{
        preserveState: true,
        replace: true
    })
})
</script>

<template>
    <select-field
        v-model="selected_department"
        :label="trans('actions.filter_by') + ' ' + trans_choice('displays.resource.department', 2)"
    >
        <option value="all" selected>{{ trans('usuals.expression.all') }}</option>
        <option v-for="data in departments" :key="data.id" :value="data.code">{{ data.label }}</option>
    </select-field>
</template>

