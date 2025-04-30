<script setup>

import {
    appRoute,
    authUser,
    authUserIsInAgency,
    currentLocale,
    resolveIsoCode,
    supportedLocales
} from "@/Helpers/Utils.js";
import CountryFlag from '@dzangolab/vue-country-flag-icon'
import '@dzangolab/vue-country-flag-icon/dist/CountryFlag.css'
import {trans} from "laravel-vue-i18n";
</script>

<template>
    <header class="app-topbar">
        <div class="page-container topbar-menu">
            <div class="d-flex align-items-center gap-2">

                <!-- Brand Logo -->
                <Link :href="appRoute('dashboard.global')" class="logo">
                    <span class="logo-light">
                        Logo Light
                    </span>

                    <span class="logo-dark">
                        Logo Dark
                    </span>
                </Link>

                <!-- Sidebar Menu Toggle Button -->
                <button class="sidenav-toggle-button px-2">
                    <i class="fas fa-bars fs-24"></i>
                </button>

                <!-- Horizontal Menu Toggle Button -->
                <button class="topnav-toggle-button px-2" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                    <i class="fas fa-bars fs-22"></i>
                </button>

                <!-- Button Trigger Search Modal -->
                <div class="topbar-search text-muted d-none d-xl-flex gap-2 align-items-center" data-bs-toggle="modal" data-bs-target="#searchModal" type="button">
                    <i class="ti ti-search fs-18"></i>
                    <span class="me-2">Search something..</span>
                </div>

                <span v-if="authUserIsInAgency()" class="fw-bold">
                    {{ authUser().agency.label }}
                </span>
            </div>

            <div class="d-flex align-items-center gap-2">

                <!-- Search for small devices -->
                <div class="topbar-item d-flex d-xl-none">
                    <button class="topbar-link" data-bs-toggle="modal" data-bs-target="#searchModal" type="button">
                        <i class="ti ti-search fs-22"></i>
                    </button>
                </div>

                <!-- Language Dropdown -->
                <div class="topbar-item">
                    <div class="dropdown">
                        <button class="topbar-link" data-bs-toggle="dropdown" data-bs-offset="0,25" type="button" aria-haspopup="false" aria-expanded="false">
                            <CountryFlag :iso="resolveIsoCode(currentLocale(['code']))" />
                        </button>

                        <div class="dropdown-menu dropdown-menu-end">
                            <a v-for="locale in supportedLocales()" :href="locale.url" class="dropdown-item" :data-translator-lang="locale.code">
                                <CountryFlag :iso="resolveIsoCode(locale.code)" class="me-1 rounded" />
                                <span class="align-middle">{{ locale.name }}</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- User Dropdown -->
                <div class="topbar-item nav-user">
                    <div class="dropdown">
                        <a class="topbar-link dropdown-toggle drop-arrow-none px-2" data-bs-toggle="dropdown" data-bs-offset="0,19" type="button" aria-haspopup="false" aria-expanded="false">
                            <img :src="authUser('admin').avatar" width="32" class="rounded-circle me-lg-2 d-flex" alt="user-image">
                            <span class="d-lg-flex flex-column gap-1 d-none">
                                    <h5 class="my-0">{{ authUser('admin').full_name }}</h5>
                                    <h6 class="my-0 fw-normal">{{ authUser('admin').roles.label }}</h6>
                                </span>
                            <i class="ti ti-chevron-down d-none d-lg-block align-middle ms-2"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="ti ti-user-hexagon me-1 fs-17 align-middle"></i>
                                <span class="align-middle">{{ trans('concerns.profile.details.label') }}</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="ti ti-password-user me-1 fs-17 align-middle"></i>
                                <span class="align-middle">{{ trans('concerns.profile.change-password.label') }}</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <Link :href="appRoute('auth.logout')" class="dropdown-item active fw-semibold text-danger">
                                <i class="ti ti-logout me-1 fs-17 align-middle"></i>
                                <span class="align-middle">{{ trans('actions.log_out') }}</span>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>


