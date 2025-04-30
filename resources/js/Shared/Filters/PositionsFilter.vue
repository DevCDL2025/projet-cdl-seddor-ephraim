<script setup>
import {trans, trans_choice} from "laravel-vue-i18n";
import {ref, watch} from "vue";
import {router} from "@inertiajs/vue3";
import SelectField from "@/Shared/Form/SelectField.vue";

let props = defineProps({
    positions: Object,
    url: String,
    byDefault: {
        type: String,
        default: "all"
    }
})

let selected_position = ref(props.byDefault)

watch(selected_position, value => {
    router.get(props.url,{'filter[position_code]': (value === 'all') ? null : value},{
        preserveState: true,
        replace: true
    })
})
</script>

<template>
    <select-field
        v-model="selected_position"
        :label="trans('actions.filter_by') + ' ' + trans_choice('displays.resource.position', 2)"
    >
        <option value="all" selected>{{ trans('usuals.expression.all') }}</option>
        <option v-for="data in positions" :key="data.id" :value="data.code">{{ data.label }}</option>
    </select-field>
</template>

