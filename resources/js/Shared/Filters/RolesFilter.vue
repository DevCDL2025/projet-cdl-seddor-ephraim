<script setup>
import {trans, trans_choice} from "laravel-vue-i18n";
import {ref, watch} from "vue";
import {router} from "@inertiajs/vue3";
import SelectField from "@/Shared/Form/SelectField.vue";

let props = defineProps({
    roles: Object,
    url: String,
    byDefault: {
        type: String,
        default: "all"
    }
})

let selected_role = ref(props.byDefault)

watch(selected_role, value => {
    router.get(props.url,{'filter[role_name]': (value === 'all') ? null : value},{
        preserveState: true,
        replace: true
    })
})
</script>

<template>
    <select-field
        v-model="selected_role"
        :label="trans('actions.filter_by') + ' ' + trans_choice('displays.resource.role', 2)"
    >
        <option value="all" selected>{{ trans('usuals.expression.all') }}</option>
        <option v-for="data in roles" :key="data.name" :value="data.name">{{ data.label }}</option>
    </select-field>
</template>

