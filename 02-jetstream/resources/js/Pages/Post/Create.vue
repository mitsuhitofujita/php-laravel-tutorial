<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CreatePostForm from '@/Pages/Post/Partials/CreatePostForm.vue';
import SectionBorder from '@/Components/SectionBorder.vue';
</script>

<template>
    <AppLayout title="CreatePost">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Post
            </h2>
        </template>
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div>
                    <CreatePostForm :post="$page.props.post"/>

                    <SectionBorder />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
