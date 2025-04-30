<script setup>
import HeadingLayout from "@/App/Layouts/HeadingLayout.vue";
import WorkerForm from "@/App/Pages/Worker/Components/WorkerForm.vue";

defineProps({
    viewElements: Object,
    viewModel: Object,
    filters: String,
    queryString: Object,
})
</script>

<template>
    <heading-layout
        :title="viewElements.title"
        :description="viewElements.description"
        :resource="viewElements.resource"
        :action="viewElements.action"
    >

        <WorkerForm
            :resource="viewElements.resource"
            :formSchema="viewModel.formSchema"
            :positions="viewModel.positions"
            :departments="viewModel.departments"
            :filters="filters"
            :queryString="queryString"
            :isUpdating="true"
        />

    </heading-layout>
</template>
