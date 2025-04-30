<script setup>
import {router} from "@inertiajs/vue3";

const props = defineProps({
    url: String,
    label: {
        type: String,
        default: () => 'Login'
    },
    class: {
        type: String,
        default: () => 'underline'
    },
    email: String,
    password: {
        type: String,
        default: "password"
    },
})

function submit () {
    router.post(props.url, {
        email: props.email,
        password: props.password,
    })
}

</script>

<template>
    <form @submit.prevent="submit">
        <button :class="props.class" type="submit">
            {{ props.label }}
        </button>
    </form>
</template>

