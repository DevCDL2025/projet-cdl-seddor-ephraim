<script setup>
import {trans, trans_choice} from "laravel-vue-i18n";
import {useForm} from "@inertiajs/vue3";
import {appRoute, isEmpty} from "@/Helpers/Utils.js";
import BackOfficeCard from "@/App/Components/Partials/BackOfficeCard.vue";
import ErrorsNotice from "@/Shared/ErrorsNotice.vue";
import InputField from "@/Shared/Form/InputField.vue";
import TextareaField from "@/Shared/Form/TextareaField.vue";
import LoadingButton from "@/Shared/Form/LoadingButton.vue";
import BackOfficePagination from "@/App/Components/Partials/BackOfficePagination.vue";
import SearchFilter from "@/Shared/Filters/SearchFilter.vue";

let props = defineProps({
    resource: Object,
    formSchema: Object,
    permissions: Object,
    filters: String,
    queryString: Object,
    isUpdating: {
        type: Boolean,
        default: false,
    }
})

const form = useForm(props.formSchema)

const action = (props.isUpdating) ? "edit" : "add"

const filter_url = (props.isUpdating)
    ? appRoute(props.resource.plural_name + '.edit', {id: form.id}, props.queryString)
    : appRoute(props.resource.plural_name + '.create', props.queryString)

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
        <div class="form-container vertical">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-3">
                    <back-office-card>
                        <template #card_header>
                            <p class="card-title h4 pb-0 mb-0 fw-bold">
                                {{ trans('actions.' + action) + " " + resource.locale.name }}
                            </p>
                        </template>

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
                        />
                    </back-office-card>
                </div>
                <div class="col-12 col-md-9">
                    <back-office-card>
                        <template #card_header>
                            <p class="card-title h4 pb-0 mb-0 fw-bold">{{ trans_choice('displays.resource.permission', 2) }}</p>
                        </template>

                        <search-filter
                            class="mb-3"
                            :str_search="filters !== null ? filters : null"
                            :url="filter_url"
                        />

                        <div class="row d-flex justify-content-end">
                            <div
                                v-for="data in permissions.data"
                                class="col-12 col-md-3"
                            >
                                <div class="form-check mb-2">
                                    <input
                                        type="checkbox"
                                        class="form-check-input"
                                        :value="data.id"
                                        v-model="form.permissions"
                                        :id="data.id"
                                    >
                                    <label class="form-check-label" :for="data.id">{{ data.label }}</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <back-office-pagination
                                    :paginator="permissions.meta"
                                    :links="permissions.meta.links"
                                    :details="true"
                                />
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
        </div>
    </form>
</template>

