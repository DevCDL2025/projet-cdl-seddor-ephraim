import { createApp, h } from 'vue'
import { createInertiaApp, Link } from '@inertiajs/vue3'
import { ZiggyVue } from 'ziggy-js';
import { i18nVue } from 'laravel-vue-i18n'
import VueApexCharts from "vue3-apexcharts"

import AppLayout from "./App/Layouts/AppLayout.vue";

import resolvePageComponent from "@/Helpers/PageResolver.js";
import {progress} from "@/Helpers/Utils.js";

import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'

const appName = import.meta.env.VITE_APP_NAME || "Rapide Course"


createInertiaApp({
    title: title => (title) ? appName + ": " + title : appName,
    resolve: (name) => resolvePageComponent(
        name,
        import.meta.glob('./App/Pages/**/*.vue', { eager: true }),
        AppLayout
    ),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(i18nVue, {
                resolve: async lang => {
                    const langs = import.meta.glob('../../lang/*.json');
                    return await langs[`../../lang/${lang}.json`]();
                }
            })
            .use(VueApexCharts)
            .component('Link', Link)
            .component('VueDatePicker', VueDatePicker)
            .mount(el)
    },
    progress: progress
})
