<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import { Link } from '@inertiajs/vue3';
import { useForm } from "@inertiajs/vue3";

const form = useForm({});
function destroy(id) {
    if (confirm("Are you sure you want to Delete")) {
        form.delete(route('post.destroy', {id: id})); /* eslint no-undef: "off", curly: "error" */
    }
}
</script>

<template>
    <AppLayout title="Posts">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Posts
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-2">
                            <Link :href="route('post.create')">
                            <PrimaryButton>Add Post</PrimaryButton>
                            </Link>
                        </div>
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">#</th>
                                        <th scope="col" class="px-6 py-3">User</th>
                                        <th scope="col" class="px-6 py-3">Payload</th>
                                        <th scope="col" class="px-6 py-3">Edit</th>
                                        <th scope="col" class="px-6 py-3">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
v-for="post in posts" :key="post.id"
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th
scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            {{ post.id }}
                                        </th>
                                        <th
scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            {{ post.user_id }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ post.payload }}
                                        </td>

                                        <td class="px-6 py-4">
                                            <Link :href="route('post.edit', {id: post.id})">
                                            <PrimaryButton>Edit</PrimaryButton>
                                            </Link>
                                        </td>
                                        <td class="px-6 py-4">
                                            <DangerButton class="bg-red-700" @click="destroy(post.id)">
                                                Delete
                                            </DangerButton>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
