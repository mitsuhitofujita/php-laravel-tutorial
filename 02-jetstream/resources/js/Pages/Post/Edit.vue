<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import EditPostForm from '@/Pages/Post/Partials/EditPostForm.vue';
import SectionBorder from '@/Components/SectionBorder.vue';
</script>

<template>
    <AppLayout title="EditPost">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Post
            </h2>
        </template>
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div>
                    <EditPostForm :post="$page.props.post"/>

                    <SectionBorder />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
