<script setup>
import {useForm} from "@inertiajs/vue3";
import {appRoute, isEmpty} from "@/Helpers/Utils.js";
import {trans, trans_choice} from "laravel-vue-i18n";
import BackOfficeCard from "@/App/Components/Partials/BackOfficeCard.vue";
import ErrorsNotice from "@/Shared/ErrorsNotice.vue";
import InputField from "@/Shared/Form/InputField.vue";
import SelectField from "@/Shared/Form/SelectField.vue";
import LoadingButton from "@/Shared/Form/LoadingButton.vue";

let props = defineProps({
    resource: Object,
    formSchema: Object,
    roles: Object,
    isUpdating: {
        type: Boolean,
        default: false,
    }
})

const form = useForm(props.formSchema)

const action = (props.isUpdating) ? "edit" : "add"

const submitForm = () => {
    const url = (props.isUpdating)
        ? appRoute(props.resource.plural_name + '.update', {id: form.id})
        : appRoute(props.resource.plural_name + '.store')

    form.post(url, {
        preserveScroll: true
    })
}
</script>

<template>
    <form @submit.prevent="submitForm()" data-parsley-validate>
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8">
                <back-office-card>
                    <errors-notice :display="isEmpty(form.errors)" />

                    <input-field
                        v-model="form.last_name"
                        :error="form.errors.last_name"
                        :label="trans('validation.attributes.last_name')"
                        class="form-item vertical w-100"
                        autocomplete="off"
                        required
                    />

                    <input-field
                        v-model="form.first_name"
                        :error="form.errors.first_name"
                        :label="trans('validation.attributes.first_name')"
                        class="form-item vertical w-100"
                        autocomplete="off"
                        required
                    />

                    <input-field
                        type="email"
                        v-model="form.email"
                        :error="form.errors.email"
                        :label="trans('validation.attributes.email')"
                        class="form-item vertical w-100"
                        autocomplete="off"
                        required
                    />

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <select-field
                                v-model="form.roles"
                                :error="form.errors.roles"
                                :label="trans_choice('displays.resource.role', 2)"
                                required
                            >
                                <option v-for="data in roles" :key="data.id" :value="data.id">{{ data.label }}</option>
                            </select-field>
                        </div>
                    </div>
                </back-office-card>
            </div>
        </div>

        <div class="row d-flex justify-content-between sticky-bottom white border-top border-dashed d-flex align-items-center w-100 py-2">
            <div class="col-12 col-md-6">

            </div>
            <div class="col-12 col-md-6 text-end">
                <loading-button
                    :loading="form.processing"
                    class="btn btn-primary"
                    type="submit"
                >
                    {{ trans('actions.save') }}
                </loading-button>
            </div>
        </div>
    </form>
</template>


