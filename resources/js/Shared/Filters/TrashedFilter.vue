<script setup>

import {trans, trans_choice} from "laravel-vue-i18n";
import {ref, watch} from "vue";
import {router} from "@inertiajs/vue3";
import SelectField from "@/Shared/Form/SelectField.vue";

let props = defineProps({
    url: String,
    byDefault: {
        type: String,
        default: "active"
    }
})

let selected_option = ref(props.byDefault)

watch(selected_option, value => {
    router.get(props.url,{'filter[trashed]': (value === 'active') ? null : value},{
        preserveState: true,
        replace: true
    })
})
</script>

<template>
    <select-field
        v-model="selected_option"
        :label="trans_choice('usuals.data.active', 2) + '/' + trans_choice('usuals.data.trashed', 2)"
    >
        <option value="active" selected>{{ trans_choice('usuals.data.active', 2) }}</option>
        <option value="only" selected>{{ trans_choice('usuals.data.trashed', 2) }}</option>
        <option value="with" selected>{{ trans('usuals.expression.all') }}</option>
    </select-field>
</template>

