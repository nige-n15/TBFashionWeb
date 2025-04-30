<!-- resources/js/Pages/Admin/SocialMedia/Create.vue -->
<template>
    <AdminLayout>
        <template #header>Create Social Media Post</template>

        <div class="mb-6">
            <Link :href="route('admin.social-media.index')" class="text-blue-600 hover:underline flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Social Media
            </Link>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow overflow-hidden lg:col-span-2">
                <form @submit.prevent="submit">
                    <div class="p-6 border-b">
                        <h2 class="text-2xl font-bold">Create New Social Media Post</h2>
                    </div>

                    <div class="p-6 space-y-6">
                        <div>
                            <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Content</label>
                            <textarea id="content" v-model="form.content" rows="5"
                                      class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                      required></textarea>
                            <div v-if="form.errors.content" class="text-red-500 text-sm mt-1">{{ form.errors.content }}</div>
                            <div class="mt-1 text-sm text-gray-500 flex justify-between">
                                <span>{{ form.content.length }} characters</span>
                                <span>Maximum: 280 for Twitter, 2200 for Facebook/Instagram</span>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Media (optional)</label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="media" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                            <span>Upload files</span>
                                            <input id="media" name="media" type="file" multiple @input="handleMedia" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                </div>
                            </div>
                            <div v-if="form.errors.media" class="text-red-500 text-sm mt-1">{{ form.errors.media }}</div>

                            <!-- Preview uploaded files -->
                            <div v-if="mediaPreview.length > 0" class="mt-4 grid grid-cols-4 gap-2">
                                <div v-for="(file, index) in mediaPreview" :key="index" class="relative">
                                    <img :src="file" alt="Preview" class="h-24 w-full object-cover rounded-md">
                                    <button type="button" @click="removeMedia(index)" class="absolute top-0 right-0 -mt-2 -mr-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-3">Select Platforms</label>
                            <div class="grid grid-cols-2 gap-4">
                                <div v-for="platform in platforms" :key="platform.id" class="relative flex items-start">
                                    <div class="flex items-center h-5">
                                        <input :id="`platform-${platform.id}`" :value="platform.id" v-model="form.platforms" type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label :for="`platform-${platform.id}`" class="font-medium text-gray-700">{{ platform.platform_name }}</label>
                                    </div>
                                </div>
                            </div>
                            <div v-if="form.errors.platforms" class="text-red-500 text-sm mt-1">{{ form.errors.platforms }}</div>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-6 py-3 flex justify-end">
                        <button type="button" @click="cancel" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 mr-3">
                            Cancel
                        </button>
                        <button type="submit" class="bg-blue-600 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" :disabled="form.processing">
                            Post Now
                        </button>
                    </div>
                </form>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Post Preview</h3>

                <div class="border rounded-lg p-4 mb-6">
                    <div class="flex items-center mb-3">
                        <div class="w-10 h-10 bg-gray-200 rounded-full"></div>
                        <div class="ml-3">
                            <p class="font-bold text-gray-900">Tatjana</p>
                            <p class="text-gray-500 text-sm">Just now</p>
                        </div>
                    </div>

                    <p class="text-gray-800 mb-3">{{ form.content || 'Your post content will appear here...' }}</p>

                    <div v-if="mediaPreview.length > 0" class="grid grid-cols-2 gap-2 mb-3">
                        <img v-for="(file, index) in mediaPreview.slice(0, 4)" :key="index" :src="file" alt="Preview" class="w-full h-32 object-cover rounded-md">
                    </div>

                    <div class="flex justify-between text-gray-500 text-sm pt-2 border-t">
                        <span>0 Likes</span>
                        <span>0 Comments</span>
                        <span>0 Shares</span>
                    </div>
                </div>

                <div>
                    <h4 class="font-bold text-gray-900 mb-2">Tips for Great Social Posts:</h4>
                    <ul class="text-sm text-gray-600 space-y-2">
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Keep posts concise and engaging
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Add relevant hashtags for better visibility
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Include eye-catching images or videos
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Ask questions to encourage engagement
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import { ref } from 'vue';
import { Link, useForm } from '@inertiajs/vue3';
import AdminLayout from '@/layouts/AdminLayout.vue';

const props = defineProps({
    platforms: Array,
});

const mediaPreview = ref([]);

const form = useForm({
    content: '',
    media: [],
    platforms: [],
});

const handleMedia = (event) => {
    const files = Array.from(event.target.files);
    form.media = [...form.media, ...files];

    // Generate previews
    files.forEach(file => {
        const reader = new FileReader();
        reader.onload = (e) => {
            mediaPreview.value.push(e.target.result);
        };
        reader.readAsDataURL(file);
    });
};

const removeMedia = (index) => {
    mediaPreview.value.splice(index, 1);
    form.media.splice(index, 1);
};

const submit = () => {
    form.post(route('admin.social-media.store'), {
        forceFormData: true,
        onSuccess: () => {
            form.reset();
            mediaPreview.value = [];
        },
    });
};

const cancel = () => {
    window.history.back();
};
</script>
