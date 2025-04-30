<script setup>

import Toast from "@/Shared/Toast.vue";
import {useForm} from "@inertiajs/vue3";
import {appRoute, isEmpty} from "@/Helpers/Utils.js";
import SeoTags from "@/Shared/SeoTags.vue";
import {trans} from "laravel-vue-i18n";
import LoadingButton from "@/Shared/Form/LoadingButton.vue";
import InputField from "@/Shared/Form/InputField.vue";
import ErrorsNotice from "@/Shared/ErrorsNotice.vue";
import Logo from "@/Shared/Logo.vue";
import LoginLink from "@/Shared/LoginLink.vue";

let props = defineProps({
    viewElements: Object,
    viewModel: Object,
})

const form = useForm(props.viewModel.formSchema)

const submitForm = () => {
    form.post(appRoute('auth.login.submit'), {
        preserveScroll: true,
        onSuccess: () => form.reset()
    })
}
</script>

<script>
export default {
    layout: null
}
</script>

<template>
    <Toast
        v-if="$page.props.flash"
        :message="$page.props.flash.message"
        :type="$page.props.flash.level"
    />

    <seo-tags
        :title="viewElements.title"
        :description="viewElements.description"
    />

    <div class="auth-bg d-flex min-vh-100 justify-content-center align-items-center">
        <div class="row g-0 justify-content-center w-100 m-xxl-5 px-xxl-4 m-3">
            <div class="col-xl-4 col-lg-5 col-md-6">
                <div class="card overflow-hidden text-center h-100 p-xxl-4 p-3 mb-0">
                    <Link :href="appRoute('auth.login')" class="auth-brand mb-3">
                        <Logo class="black-text fw-bold" />
                    </Link>

                    <p class="text-muted mb-4">{{ trans('messages.login_to_start') }}</p>

                    <form @submit.prevent="submitForm()" data-parsley-validate class="text-start mb-3">
                        <errors-notice :display="isEmpty(form.errors)" />

                        <input-field
                            v-model="form.email"
                            :error="form.errors.email"
                            type="email"
                            :label="trans('validation.attributes.email')"
                            class="form-item vertical"
                            autocomplete="off"
                            required
                        />


                        <input-field
                            v-model="form.password"
                            :error="form.errors.password"
                            type="password"
                            :label="trans('validation.attributes.password')"
                            class="form-item vertical"
                            required
                        />

                        <div class="d-grid">
                            <loading-button
                                :loading="form.processing"
                                class="btn btn-primary"
                                type="submit"
                            >
                                {{ trans('actions.log_in') }}
                            </loading-button>
                        </div>
                    </form>

                    <div
                        v-if="viewModel.loginLinks !== undefined && $page.props.environment === 'local'"
                        class="text-danger fs-14 mb-4"
                    >

                        <LoginLink
                            v-for="data in viewModel.loginLinks"
                            :label="'Login as ' + data.role"
                            :email="data.email"
                            class="btn border-0 fw-semibold text-dark ms-1"
                            :url="appRoute('auth.login.submit')"
                        />

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


