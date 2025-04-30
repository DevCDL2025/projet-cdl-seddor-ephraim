<script setup>
import { toast } from "vue3-toastify";
import 'vue3-toastify/dist/index.css'

let props = defineProps({
    message: String,
    type: String
});

const options = {
    'position': toast.POSITION.TOP_RIGHT,
    'autoClose': 3000,
    'closeOnClick': true,
    'theme': "colored",
    'type': 'default'
}

const notify = (type, message) => {
    options['type'] = type

    toast(message, options)
}

notify(props.type, props.message)
</script>

<template></template>


