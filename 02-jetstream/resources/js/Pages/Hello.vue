<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    world: String,
});
</script>

<template>
    <AppLayout title="Hello">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Hello, {{ world }}
            </h2>
        </template>
    </AppLayout>
</template>
