<script setup>
defineProps({
    doctor: Object
})
</script>

<template>
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center gap-2">
                <img :src="doctor['avatar']" alt="" class="avatar-xl rounded-circle border border-light border-2">
                <div>
                    <h4 class="text-dark fw-medium">{{ doctor['full_name'] }}</h4>
                    <p class="mb-0 text-muted">{{ doctor['speciality'] }}</p>
                </div>
                <div class="ms-auto"></div>
            </div>

            <div class="mt-3">
                <h4 class="fs-15">Contact :</h4>
                <div class="mt-3">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <div class="bg-opacity-75 d-flex align-items-center justify-content-center rounded">
                            <iconify-icon icon="solar:point-on-map-bold-duotone" class="fs-20 text-primary"></iconify-icon>
                        </div>
                        <p class="mb-0 text-dark">2713 Frum Street Nashville, TN 37207</p>
                    </div>
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <div class="bg-opacity-75 d-flex align-items-center justify-content-center rounded">
                            <iconify-icon icon="solar:smartphone-2-bold-duotone" class="fs-20 text-primary"></iconify-icon>
                        </div>
                        <p class="mb-0 text-dark">{{ doctor['phone_number'] }}</p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <div class="bg-opacity-75 d-flex align-items-center justify-content-center rounded">
                            <iconify-icon icon="solar:letter-bold-duotone" class="fs-20 text-primary"></iconify-icon>
                        </div>
                        <p class="mb-0 text-dark">{{ doctor['email'] }}</p>
                    </div>
                </div>
            </div>

            <slot />
        </div>
    </div>
</template>

