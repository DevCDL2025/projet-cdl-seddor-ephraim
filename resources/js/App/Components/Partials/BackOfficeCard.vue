<script setup>

</script>

<template>
    <div class="card">
        <div class="card-header border-bottom border-dashed card-tabs d-flex flex-wrap justify-content-between align-items-center gap-2">
            <slot name="card_header" />
        </div>
        <div class="card-body">
            <slot name="default" />
        </div>
    </div>
</template>

