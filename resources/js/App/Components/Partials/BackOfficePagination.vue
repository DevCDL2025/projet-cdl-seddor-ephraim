<script setup>
defineProps({
    paginator: Object,
    links: Object,
    details: Boolean
});
</script>

<template>
    <div class="d-flex justify-content-between mt-3 px-2">
        <div class="pagination-total fw-bold">
            Total : <span>{{ paginator.total }}</span>
        </div>

        <nav>
            <ul class="pagination pagination-boxed">
                <li
                    class="page-item"
                    v-for="link in links"
                    :class="{ 'pagination-pager-disabled': ! link.url, 'active': link.active }"
                >
                    <Component
                        :is="link.url ? 'Link' : 'span'"
                        :href="link.url"
                        class="page-link"
                    >
                        <span v-if="link.label.includes('laquo') ">&laquo;</span>
                        <span v-else-if="link.label.includes('raquo') ">&raquo;</span>
                        <span v-else>{{ link.label }}</span>
                    </Component>
                </li>
            </ul>
        </nav>
    </div>
</template>


