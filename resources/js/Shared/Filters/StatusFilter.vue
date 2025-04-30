<script setup>
import {trans} from "laravel-vue-i18n";
import {ref, watch} from "vue";
import {router} from "@inertiajs/vue3";
import SelectField from "@/Shared/Form/SelectField.vue";

let props = defineProps({
    status: Object,
    url: String,
    byDefault: {
        type: String,
        default: "all"
    }
})

let selected_status = ref(props.byDefault)

watch(selected_status, value => {
    router.get(props.url,{'filter[status]': (value === 'all') ? null : value},{
        preserveState: true,
        replace: true
    })
})
</script>

<template>
    <select-field
        v-model="selected_status"
        :label="trans('actions.filter_by') + ' ' + trans('validation.attributes.status')"
    >
        <option value="all" selected>{{ trans('usuals.expression.all') }}</option>
        <option v-for="data in status" :key="data.value" :value="data.value">{{ data.description }}</option>
    </select-field>
</template>

