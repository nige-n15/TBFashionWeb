<!-- resources/js/Pages/Blog/Index.vue -->
<template>
    <MainLayout>
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold mb-6">Blog</h1>

            <div v-if="posts.data.length > 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div v-for="post in posts.data" :key="post.id" class="bg-white shadow rounded-lg overflow-hidden">
                    <img v-if="post.featured_image" :src="`/storage/${post.featured_image}`" :alt="post.title" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h2 class="text-xl font-bold mb-2">{{ post.title }}</h2>
                        <p class="text-gray-500 text-sm mb-4">
                            {{ new Date(post.published_at).toLocaleDateString() }}
                        </p>
                        <p class="text-gray-700 mb-4">{{ post.content.substring(0, 120) }}...</p>
                        <Link :href="route('blog.show', post.slug)" class="text-blue-600 font-medium hover:underline">
                            Read More
                        </Link>
                    </div>
                </div>
            </div>

            <div v-else class="bg-white shadow rounded-lg p-8 text-center">
                <p class="text-gray-700">No blog posts available at the moment. Check back later!</p>
            </div>

            <!-- Pagination -->
            <div v-if="posts.links.length > 3" class="mt-8 flex justify-center">
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
    </MainLayout>
</template>

<script setup>
import MainLayout from '@/layouts/MainLayout.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    posts: Object,
});
</script>
