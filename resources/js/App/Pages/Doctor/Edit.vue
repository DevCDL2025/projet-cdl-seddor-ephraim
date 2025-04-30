<script setup>
import DoctorForm from "@/App/Pages/Doctor/Components/DoctorForm.vue";
import HeadingLayout from "@/App/Layouts/HeadingLayout.vue";

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

        <DoctorForm
            :resource="viewElements.resource"
            :formSchema="viewModel.formSchema"
            :specialities="viewModel.specialities"
            :departments="viewModel.departments"
            :filters="filters"
            :queryString="queryString"
            :isUpdating="true"
        />

    </heading-layout>
</template>
