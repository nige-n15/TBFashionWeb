<!-- resources/js/Pages/Admin/Dashboard.vue -->
<template>
    <AdminLayout>
        <template #header>Dashboard</template>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Blog Statistics</h3>
                <div class="flex items-center justify-between mb-2">
                    <span class="text-gray-600">Total Posts</span>
                    <span class="text-xl font-bold">{{ recentPosts.length }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-gray-600">Published Posts</span>
                    <span class="text-xl font-bold">{{ publishedCount }}</span>
                </div>
                <div class="mt-4">
                    <Link :href="route('admin.blog.index')" class="text-blue-600 hover:underline">View All Posts</Link>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Social Media</h3>
                <div class="flex items-center justify-between mb-2">
                    <span class="text-gray-600">Connected Platforms</span>
                    <span class="text-xl font-bold">{{ socialPlatforms.length }}</span>
                </div>
                <div class="mt-4">
                    <Link :href="route('admin.social-media.index')" class="text-blue-600 hover:underline">Manage Social Media</Link>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Marketplace</h3>
                <div class="flex items-center justify-between mb-2">
                    <span class="text-gray-600">Connected Platforms</span>
                    <span class="text-xl font-bold">{{ marketplacePlatforms.length }}</span>
                </div>
                <div class="mt-4">
                    <Link :href="route('admin.marketplace.index')" class="text-blue-600 hover:underline">Manage Marketplace</Link>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow mb-8">
            <div class="p-6 border-b">
                <h3 class="text-lg font-bold text-gray-900">Recent Blog Posts</h3>
            </div>
            <div class="divide-y">
                <div v-for="post in recentPosts" :key="post.id" class="p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="font-bold text-gray-900">{{ post.title }}</h4>
                            <p class="text-sm text-gray-500">
                                {{ post.published ? 'Published' : 'Draft' }}
                                {{ post.published_at ? `on ${new Date(post.published_at).toLocaleDateString()}` : '' }}
                            </p>
                        </div>
                        <div class="flex space-x-2">
                            <Link :href="route('admin.blog.edit', post.id)" class="text-blue-600 hover:underline">Edit</Link>
                            <Link v-if="post.published" :href="route('blog.show', post.slug)" class="text-green-600 hover:underline">View</Link>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-6 border-t">
                <Link :href="route('admin.blog.create')" class="inline-block bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Create New Post
                </Link>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-lg shadow">
                <div class="p-6 border-b">
                    <h3 class="text-lg font-bold text-gray-900">Quick Actions</h3>
                </div>
                <div class="p-6 space-y-4">
                    <Link :href="route('admin.social-media.create')" class="block py-2 px-4 bg-blue-50 hover:bg-blue-100 text-blue-700 rounded">
                        Post to Social Media
                    </Link>
                    <Link :href="route('admin.marketplace.create')" class="block py-2 px-4 bg-blue-50 hover:bg-blue-100 text-blue-700 rounded">
                        Create Marketplace Listing
                    </Link>
                    <Link :href="route('admin.blog.create')" class="block py-2 px-4 bg-blue-50 hover:bg-blue-100 text-blue-700 rounded">
                        Write a Blog Post
                    </Link>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow">
                <div class="p-6 border-b">
                    <h3 class="text-lg font-bold text-gray-900">Connected Platforms</h3>
                </div>
                <div class="p-6">
                    <div class="mb-4">
                        <h4 class="font-bold text-gray-900 mb-2">Social Media</h4>
                        <div v-if="socialPlatforms.length > 0" class="space-y-2">
                            <div v-for="platform in socialPlatforms" :key="platform.id" class="flex items-center">
                                <span class="w-3 h-3 rounded-full bg-green-500 mr-2"></span>
                                <span>{{ platform.platform_name }}</span>
                            </div>
                        </div>
                        <p v-else class="text-gray-500">No social media platforms connected</p>
                    </div>

                    <div>
                        <h4 class="font-bold text-gray-900 mb-2">Marketplace</h4>
                        <div v-if="marketplacePlatforms.length > 0" class="space-y-2">
                            <div v-for="platform in marketplacePlatforms" :key="platform.id" class="flex items-center">
                                <span class="w-3 h-3 rounded-full bg-green-500 mr-2"></span>
                                <span>{{ platform.platform_name }}</span>
                            </div>
                        </div>
                        <p v-else class="text-gray-500">No marketplace platforms connected</p>
                    </div>
                </div>
                <div class="p-6 border-t">
                    <Link :href="route('admin.platforms.index')" class="text-blue-600 hover:underline">
                        Manage Platform Connections
                    </Link>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';
import AdminLayout from '@/layouts/AdminLayout.vue';

const props = defineProps({
    recentPosts: Array,
    socialPlatforms: Array,
    marketplacePlatforms: Array,
});

const publishedCount = computed(() => {
    return props.recentPosts.filter(post => post.published).length;
});
</script>
