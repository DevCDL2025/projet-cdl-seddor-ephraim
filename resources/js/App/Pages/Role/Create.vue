<script setup>
import HeadingLayout from "@/App/Layouts/HeadingLayout.vue";
import RoleForm from "@/App/Pages/Role/Components/RoleForm.vue";

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

        <RoleForm
            :resource="viewElements.resource"
            :formSchema="viewModel.formSchema"
            :permissions="viewModel.permissions"
            :filters="filters"
            :queryString="queryString"
        />

    </heading-layout>
</template>

