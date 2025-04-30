<script setup>
import {useForm} from "@inertiajs/vue3";
import {appRoute, isEmpty} from "@/Helpers/Utils.js";
import {trans} from "laravel-vue-i18n";
import {ref} from "vue";
import DialogModal from "@/Shared/Modals/DialogModal.vue";
import ErrorsNotice from "@/Shared/ErrorsNotice.vue";
import InputField from "@/Shared/Form/InputField.vue";
import TextareaField from "@/Shared/Form/TextareaField.vue";
import LoadingButton from "@/Shared/Form/LoadingButton.vue";

let props = defineProps({
    resource: Object,
    formSchema: Object,
})

const dialog = ref(null)
const isUpdating = ref(false);
const action = ref('add')

const form = useForm(props.formSchema)

const openForm = (data = null) => {
    if (data) {
        Object.assign(form, data);
        isUpdating.value = true;
        action.value = "edit"
    }

    else {
        form.reset();
        isUpdating.value = false;
        action.value = "add"
    }

    dialog.value.openDialog()
}

const submitForm = () => {
    const url = (isUpdating.value)
        ? appRoute(props.resource.plural_name + '.update', {id: form.id})
        : appRoute(props.resource.plural_name + '.store')

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
    <DialogModal ref="dialog">
        <template #dialog_title>
            {{ trans('actions.' + action) + " " + props.resource.locale.name }}
        </template>

        <form @submit.prevent="submitForm()" data-parsley-validate>

            <errors-notice :display="isEmpty(form.errors)" />

            <input-field
                v-model="form.name"
                :error="form.errors.name"
                :label="trans('validation.attributes.name')"
                class="form-item vertical w-100"
                autocomplete="off"
                required
                :readonly="isUpdating === true"
            />

            <input-field
                v-model="form.label"
                :error="form.errors.label"
                :label="trans('validation.attributes.label')"
                class="form-item vertical w-100"
                autocomplete="off"
            />

            <textarea-field
                v-model="form.description"
                :error="form.errors.description"
                :label="trans('validation.attributes.description')"
                class="form-item vertical w-100"
                autocomplete="off"
                maxlength="75"
            />

            <loading-button
                :loading="form.processing"
                class="btn btn-primary"
                type="submit"
            >
                {{ trans('actions.save') }}
            </loading-button>

        </form>

    </DialogModal>
</template>


