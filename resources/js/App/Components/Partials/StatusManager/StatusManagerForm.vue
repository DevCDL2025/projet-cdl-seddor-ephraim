<script setup>
import DialogModal from "@/Shared/Modals/DialogModal.vue";
import {ref} from "vue";
import {trans} from "laravel-vue-i18n";
import {useForm} from "@inertiajs/vue3";
import {appRoute, isEmpty} from "@/Helpers/Utils.js";
import ErrorsNotice from "@/Shared/ErrorsNotice.vue";
import LoadingButton from "@/Shared/Form/LoadingButton.vue";

let props = defineProps({
    resource: Object,
    status: Object,
    route_param: Object,
})

const form = useForm({
    status: null
})

const dialog = ref(null)

const openForm = (data = null) => {
    form.status = data.status.value
    dialog.value.openDialog()
}

const submitForm = () => {
    const url = appRoute(props.resource.plural_name + '.change-status', props.route_param)

    form.post(url, {
        preserveScroll: true,
        onSuccess: () => {
            dialog.value.closeDialog()
            form.reset()
        }
    })
}

defineExpose({
    openForm
})

</script>

<template>
    <dialog-modal ref="dialog" class=" p-0">
        <template #dialog_title class="p-0">
            {{ trans('actions.change') + " " + trans('displays.status.label') }}
        </template>

        <form @submit.prevent="submitForm()" data-parsley-validate>
            <errors-notice :display="isEmpty(form.errors)" />

            <div v-for="data in status" class="mb-3">
                <div class="form-check mb-1">
                    <input
                        type="radio"
                        :id="data.value"
                        class="form-check-input"
                        v-model="form.status"
                        :value="data.value"
                    >
                    <label class="form-check-label" :for="data.value">
                        {{ data.label }}
                    </label>
                </div>
                <div v-if="form.errors.status" class="form-error">{{ form.errors.status }}</div>
            </div>

            <loading-button
                :loading="form.processing"
                class="btn btn-primary"
                type="submit"
            >
                {{ trans('actions.save') }}
            </loading-button>
        </form>
    </dialog-modal>
</template>


