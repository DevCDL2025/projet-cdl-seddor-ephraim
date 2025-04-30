<script setup>
import HeadingLayout from "@/App/Layouts/HeadingLayout.vue";
import AdminForm from "@/App/Pages/Admin/Components/AdminForm.vue";

defineProps({
    viewElements: Object,
    viewModel: Object,
})

</script>

<template>
    <heading-layout
        :title="viewElements.title"
        :description="viewElements.description"
        :resource="viewElements.resource"
        :action="viewElements.action"
    >

        <AdminForm
            :resource="viewElements.resource"
            :formSchema="viewModel.formSchema"
            :roles="viewModel.roles"
            :agencies="viewModel.agencies"
            :isUpdating="true"
        />

    </heading-layout>
</template>

