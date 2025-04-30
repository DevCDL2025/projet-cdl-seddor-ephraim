<script setup>
import HeadingLayout from "@/App/Layouts/HeadingLayout.vue";
import {trans_choice} from "laravel-vue-i18n";
import {appRoute, userHasPermission} from "@/Helpers/Utils.js";

defineProps({
    viewElements: Object,
    total: Object,
})
</script>

<template>
    <heading-layout
        :title="viewElements.title"
        :description="viewElements.description"
    >

        <div class="row row-cols-xxl-5 row-cols-md-3 row-cols-1 align-items-center">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted fs-13 text-uppercase" title="Number of Orders">Total {{ trans_choice('displays.resource.speciality', 2) }}</h5>
                        <div class="d-flex align-items-center gap-2 my-3">
                            <div class="avatar-md flex-shrink-0">
                                <span class="avatar-title bg-primary-subtle text-primary rounded fs-22">
                                    <i class="ti ti-user-cog"></i>
                                </span>
                            </div>
                            <h3 class="mb-0 fw-bold">{{ total.speciality }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted fs-13 text-uppercase" title="Number of Orders">Total {{ trans_choice('displays.resource.department', 2) }}</h5>
                        <div class="d-flex align-items-center gap-2 my-3">
                            <div class="avatar-md flex-shrink-0">
                                <span class="avatar-title bg-primary-subtle text-primary rounded fs-22">
                                    <i class="ti ti-building"></i>
                                </span>
                            </div>
                            <h3 class="mb-0 fw-bold">{{ total.department }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted fs-13 text-uppercase" title="Number of Orders">Total {{ trans_choice('displays.resource.position', 2) }}</h5>
                        <div class="d-flex align-items-center gap-2 my-3">
                            <div class="avatar-md flex-shrink-0">
                                <span class="avatar-title bg-primary-subtle text-primary rounded fs-22">
                                    <i class="ti ti-user-cog"></i>
                                </span>
                            </div>
                            <h3 class="mb-0 fw-bold">{{ total.position }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted fs-13 text-uppercase" title="Number of Orders">Total {{ trans_choice('displays.resource.doctor', 2) }}</h5>
                        <div class="d-flex align-items-center gap-2 my-3">
                            <div class="avatar-md flex-shrink-0">
                                <span class="avatar-title bg-primary-subtle text-primary rounded fs-22">
                                    <i class="ti ti-stethoscope"></i>
                                </span>
                            </div>
                            <h3 class="mb-0 fw-bold">{{ total.doctor }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted fs-13 text-uppercase" title="Number of Orders">Total {{ trans_choice('displays.resource.nurse', 2) }}</h5>
                        <div class="d-flex align-items-center gap-2 my-3">
                            <div class="avatar-md flex-shrink-0">
                                <span class="avatar-title bg-primary-subtle text-primary rounded fs-22">
                                    <i class="ti ti-stethoscope"></i>
                                </span>
                            </div>
                            <h3 class="mb-0 fw-bold">{{ total.nurse }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted fs-13 text-uppercase" title="Number of Orders">Total {{ trans_choice('displays.resource.worker', 2) }}</h5>
                        <div class="d-flex align-items-center gap-2 my-3">
                            <div class="avatar-md flex-shrink-0">
                                <span class="avatar-title bg-primary-subtle text-primary rounded fs-22">
                                    <i class="ti ti-stethoscope"></i>
                                </span>
                            </div>
                            <h3 class="mb-0 fw-bold">{{ total.worker }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </heading-layout>
</template>


