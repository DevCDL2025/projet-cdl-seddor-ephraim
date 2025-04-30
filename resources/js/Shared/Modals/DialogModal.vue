<script setup>
import {ref} from "vue";

const dialog = ref(null)

const openDialog = () => {
    dialog.value.showModal()
}

const closeDialog = () => {
    dialog.value.close()
}

defineExpose({
    openDialog,
    closeDialog
})

</script>

<template>
    <dialog ref="dialog" class="w-25 white">
        <div class="px-2 py-2">
            <div class="card-header mb-3 pb-3 border-bottom flex items-center justify-between d-flex align-items-center justify-content-between">
                <h3 class="card-title mr-4 fw-bold">
                    <slot name="dialog_title" />
                </h3>
                <button class="btn" autofocus @click="closeDialog">
                    <i class="fas fa-fw fa-lg fa-times-circle"></i>
                </button>
            </div>
            <div class="card-body">
                <slot />
            </div>
            <footer class="card-footer">
                <slot name="dialog_footer" />
            </footer>
        </div>
    </dialog>
</template>

<style scoped>
dialog {
    border: 1px solid #979595;
    border-radius: 0.6rem;
    box-shadow: 0 0 1em black;
}

dialog::backdrop {
    /* make the backdrop a semi-transparent black */
    background-color: rgba(0, 0, 0, 0.4);
}
</style>

