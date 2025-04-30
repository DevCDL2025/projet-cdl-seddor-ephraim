<script setup>

import {
    appRoute,
    userHasPermission,
    userHasPermissions
} from "@/Helpers/Utils.js";
import Logo from "@/Shared/Logo.vue";
import {trans, trans_choice} from "laravel-vue-i18n";

</script>

<template>

    <div class="sidenav-menu">

        <!-- Brand Logo -->
        <Link :href="appRoute('dashboard.global')" class="logo">
            <span class="logo-light">
                <Logo class="white-text mt-2" />
            </span>

            <span class="logo-dark">
                <Logo />
            </span>
        </Link>

        <!-- Sidebar Hover Menu Toggle Button -->
        <button class="button-sm-hover">
            <i class="fas fa-circle"></i>
        </button>

        <!-- Full Sidebar Menu Close Button -->
        <button class="button-close-fullsidebar">
            <i class="fas fa-markdown"></i>
        </button>

        <div data-simplebar class="pt-3">

            <!--- Sidenav Menu -->
            <ul class="side-nav">
                <div>
                    <li class="side-nav-title">{{ trans('displays.dashboard.label') }}</li>

                    <div>
                        <li class="side-nav-item">
                            <Link :href="appRoute('dashboard.global')" class="side-nav-link">
                                <span class="menu-icon"><i class="ti ti-dashboard"></i></span>
                                <span class="menu-text"> {{ trans('concerns.dashboard.label') }} </span>
                            </Link>
                        </li>
                    </div>
                </div>

                <div v-if="userHasPermissions(['view specialities', 'view departments'])" >
                    <li class="side-nav-title">
                        {{ trans_choice("displays.resource.speciality", 2) }} / {{ trans_choice("displays.resource.department", 2) }}
                    </li>

                    <li v-if="userHasPermission('view specialities')" class="side-nav-item">
                        <Link :href="appRoute('specialities.index')" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-user-star"></i></span>
                            <span class="menu-text"> {{ trans_choice('displays.resource.speciality', 2) }} </span>
                        </Link>
                    </li>

                    <li v-if="userHasPermission('view departments')" class="side-nav-item">
                        <Link :href="appRoute('departments.index')" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-building"></i></span>
                            <span class="menu-text"> {{ trans_choice('displays.resource.department', 2) }} </span>
                        </Link>
                    </li>
                </div>

                <div v-if="userHasPermissions(['view positions', 'view doctors'])" >
                    <li class="side-nav-title">
                        {{ trans("displays.manage.staffs") }}
                    </li>

                    <li v-if="userHasPermission('view positions')" class="side-nav-item">
                        <Link :href="appRoute('positions.index')" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-users-group"></i></span>
                            <span class="menu-text"> {{ trans_choice('displays.resource.position', 2) }} / Jobs </span>
                        </Link>
                    </li>

                    <li v-if="userHasPermission('view doctors')" class="side-nav-item">
                        <Link :href="appRoute('doctors.index')" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-stethoscope"></i></span>
                            <span class="menu-text"> {{ trans_choice('displays.resource.doctor', 2) }} </span>
                        </Link>
                    </li>

                    <li v-if="userHasPermission('view nurses')" class="side-nav-item">
                        <Link :href="appRoute('nurses.index')" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-stethoscope"></i></span>
                            <span class="menu-text"> {{ trans_choice('displays.resource.nurse', 2) }} </span>
                        </Link>
                    </li>

                    <li v-if="userHasPermission('view workers')" class="side-nav-item">
                        <Link :href="appRoute('workers.index')" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-user-cog"></i></span>
                            <span class="menu-text"> {{ trans_choice('displays.resource.worker', 2) }} </span>
                        </Link>
                    </li>
                </div>

                <div v-if="userHasPermissions(['view permissions', 'view roles', 'view users'])" >
                    <li class="side-nav-title">{{ trans("displays.manage.permissions") }}</li>

                    <li v-if="userHasPermission('view users')" class="side-nav-item">
                        <Link :href="appRoute('users.index')" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-users"></i></span>
                            <span class="menu-text"> {{ trans_choice('displays.resource.user', 2) }} </span>
                        </Link>
                    </li>

                    <li v-if="userHasPermission('view roles')" class="side-nav-item">
                        <Link :href="appRoute('roles.index')" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-user-shield"></i></span>
                            <span class="menu-text"> {{ trans_choice('displays.resource.role', 2) }} </span>
                        </Link>
                    </li>

                    <li v-if="userHasPermission('view permissions')" class="side-nav-item">
                        <Link :href="appRoute('permissions.index')" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-lock"></i></span>
                            <span class="menu-text"> {{ trans_choice('displays.resource.permission', 2) }} </span>
                        </Link>
                    </li>
                </div>

                <div v-if="userHasPermissions(['view identity-documents', 'view department-types'])" >
                    <li class="side-nav-title">
                        {{ trans_choice("displays.resource.setting", 2) }}
                    </li>

                    <li v-if="userHasPermission('view identity-documents')" class="side-nav-item">
                        <Link :href="appRoute('identity-documents.index')" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-id"></i></span>
                            <span class="menu-text"> {{ trans_choice('displays.resource.identity-document', 2) }} </span>
                        </Link>
                    </li>

                    <li v-if="userHasPermission('view department-types')" class="side-nav-item">
                        <Link :href="appRoute('department-types.index')" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-tags"></i></span>
                            <span class="menu-text"> {{ trans_choice('displays.resource.department-type', 2) }} </span>
                        </Link>
                    </li>
                </div>
            </ul>

            <div class="clearfix"></div>
        </div>
    </div>
</template>

