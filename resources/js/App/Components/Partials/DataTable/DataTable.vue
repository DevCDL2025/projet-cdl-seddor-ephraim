<script setup>

defineProps({
    columns: Object,
    showActionColumn: {
        type: Boolean,
        default: true
    },
})
</script>

<template>
    <table class="table table-hover text-nowrap mb-0">
        <thead>
            <tr class="grey lighten-4">
                <th
                    v-for="column in columns" id="column"
                    class="black-text bold capitalize fnt-bold"
                >
                    {{ column.label }}
                </th>
                <th v-if="showActionColumn" class="black-text bold capitalize fnt-bold">Actions</th>
            </tr>
        </thead>
        <tbody>
            <slot />
        </tbody>
    </table>
</template>


