<!-- resources/js/Pages/Admin/SocialMedia/Index.vue -->
<template>
    <AdminLayout>
        <template #header>Social Media</template>

        <div class="mb-6 flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold">Manage Social Media</h2>
                <p class="text-gray-600">Post to multiple social media platforms from one place.</p>
            </div>
            <Link :href="route('admin.social-media.create')" class="bg-blue-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700">
                Create Post
            </Link>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6 lg:col-span-2">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Recent Posts</h3>

                <div v-if="posts.data.length > 0" class="divide-y">
                    <div v-for="post in posts.data" :key="post.id" class="py-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="font-bold text-gray-900">{{ post.platform.platform_name }}</h4>
                                <p class="text-gray-700 mt-1">{{ post.content }}</p>
                                <div v-if="post.media && post.media.length > 0" class="mt-2 flex space-x-2">
                                    <img v-for="(image, i) in post.media" :key="i" :src="`/storage/${image}`" alt="Media" class="h-16 w-16 object-cover rounded">
                                </div>
                                <p class="text-sm text-gray-500 mt-2">
                                    Posted on {{ new Date(post.published_at).toLocaleString() }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else class="text-center py-8">
                    <p class="text-gray-600">No posts yet. Create your first social media post!</p>
                </div>

                <!-- Pagination -->
                <div v-if="posts.links && posts.links.length > 3" class="mt-6 flex justify-center">
                    <div class="flex space-x-1">
                        <Link
                            v-for="(link, i) in posts.links"
                            :key="i"
                            :href="link.url"
                            class="px-4 py-2 border rounded"
                            :class="{
                'bg-blue-600 text-white': link.active,
                'bg-white text-gray-700 hover:bg-gray-100': !link.active,
                'opacity-50 cursor-not-allowed': !link.url
              }"
                            v-html="link.label"
                        />
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Connected Platforms</h3>

                <div v-if="platforms.length > 0">
                    <div v-for="platform in platforms" :key="platform.id" class="flex items-center py-2">
                        <span class="w-3 h-3 rounded-full bg-green-500 mr-2"></span>
                        <span class="font-medium">{{ platform.platform_name }}</span>
                    </div>
                </div>
                <div v-else class="text-center py-4">
                    <p class="text-gray-600">No platforms connected yet.</p>
                </div>

                <div class="mt-4">
                    <Link :href="route('admin.platforms.index')" class="text-blue-600 hover:underline">
                        Manage Platform Connections
                    </Link>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import AdminLayout from '@/layouts/AdminLayout.vue';

defineProps({
    platforms: Array,
    posts: Object,
});
</script>
