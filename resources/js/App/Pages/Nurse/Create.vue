<script setup>
import DoctorForm from "@/App/Pages/Doctor/Components/DoctorForm.vue";
import HeadingLayout from "@/App/Layouts/HeadingLayout.vue";
import NurseForm from "@/App/Pages/Nurse/Components/NurseForm.vue";

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

        <NurseForm
            :resource="viewElements.resource"
            :formSchema="viewModel.formSchema"
            :specialities="viewModel.specialities"
            :departments="viewModel.departments"
            :filters="filters"
            :queryString="queryString"
        />

    </heading-layout>
</template>
