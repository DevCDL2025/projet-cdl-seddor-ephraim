<script setup>
import HeadingLayout from "@/App/Layouts/HeadingLayout.vue";
import DepartmentForm from "@/App/Pages/Department/Components/DepartmentForm.vue";

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

        <DepartmentForm
            :resource="viewElements.resource"
            :formSchema="viewModel.formSchema"
            :specialities="viewModel.specialities"
            :departmentTypes="viewModel.departmentTypes"
            :filters="filters"
            :queryString="queryString"
        />

    </heading-layout>
</template>
