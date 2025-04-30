<script setup>
  import DepartmentForm from "@/App/Pages/Department/Components/DepartmentForm.vue";
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

        <DepartmentForm
            :resource="viewElements.resource"
            :formSchema="viewModel.formSchema"
            :specialities="viewModel.specialities"
            :departmentTypes="viewModel.departmentTypes"
            :filters="filters"
            :queryString="queryString"
            :isUpdating="true"
        />

    </heading-layout>
</template>
