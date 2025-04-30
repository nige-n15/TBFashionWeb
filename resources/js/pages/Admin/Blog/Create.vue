
<!-- resources/js/Pages/Admin/Blog/Create.vue -->
<template>
    <AdminLayout>
        <template #header>Create Blog Post</template>

        <div class="mb-6">
            <Link :href="route('admin.blog.index')" class="text-blue-600 hover:underline flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to All Posts
            </Link>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <form @submit.prevent="submit">
                <div class="p-6 border-b">
                    <h2 class="text-2xl font-bold">Create New Blog Post</h2>
                </div>

                <div class="p-6 space-y-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                        <input type="text" id="title" v-model="form.title" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <div v-if="form.errors.title" class="text-red-500 text-sm mt-1">{{ form.errors.title }}</div>
                    </div>

                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Content</label>
                        <textarea id="content" v-model="form.content" rows="10" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required></textarea>
                        <div v-if="form.errors.content" class="text-red-500 text-sm mt-1">{{ form.errors.content }}</div>
                    </div>

                    <div>
                        <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-1">Featured Image</label>
                        <input type="file" id="featured_image" @input="form.featured_image = $event.target.files[0]" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        <div v-if="form.errors.featured_image" class="text-red-500 text-sm mt-1">{{ form.errors.featured_image }}</div>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" id="published" v-model="form.published" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="published" class="ml-2 block text-sm text-gray-900">Publish immediately</label>
                    </div>

                    <div v-if="!form.published">
                        <label for="published_at" class="block text-sm font-medium text-gray-700 mb-1">Publish Date</label>
                        <input type="datetime-local" id="published_at" v-model="form.published_at" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <div v-if="form.errors.published_at" class="text-red-500 text-sm mt-1">{{ form.errors.published_at }}</div>
                    </div>
                </div>

                <div class="bg-gray-50 px-6 py-3 flex justify-end">
                    <button type="button" @click="cancel" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 mr-3">
                        Cancel
                    </button>
                    <button type="submit" class="bg-blue-600 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" :disabled="form.processing">
                        Create Post
                    </button>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>

<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import AdminLayout from '@/layouts/AdminLayout.vue';

const form = useForm({
    title: '',
    content: '',
    featured_image: null,
    published: false,
    published_at: null,
});

const submit = () => {
    form.post(route('admin.blog.store'), {
        onSuccess: () => {
            form.reset();
        },
    });
};

const cancel = () => {
    window.history.back();
};
</script>
