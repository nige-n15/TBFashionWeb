<template>
    <MainLayout>
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-3xl mx-auto">
                <div v-if="$page.props.auth.user" class="mb-6 flex justify-end">
                    <Link :href="route('admin.blog.edit', post.id)" class="bg-blue-600 text-white px-4 py-2 rounded-lg mr-2">
                        Edit
                    </Link>
                    <button @click="confirmDelete" class="bg-red-600 text-white px-4 py-2 rounded-lg">
                        Delete
                    </button>
                </div>

                <h1 class="text-3xl font-bold mb-2">{{ post.title }}</h1>
                <p class="text-gray-500 mb-6">
                    Published on {{ new Date(post.published_at).toLocaleDateString() }}
                </p>

                <img v-if="post.featured_image" :src="`/storage/${post.featured_image}`" :alt="post.title" class="w-full h-64 object-cover rounded-lg mb-6">

                <div class="prose prose-lg max-w-none" v-html="formattedContent"></div>
            </div>
        </div>
    </MainLayout>
</template>

<script setup>
import { computed } from 'vue';
import { Link, router } from '@inertiajs/vue3';
import MainLayout from '@/layouts/MainLayout.vue';

const props = defineProps({
    post: Object,
});

const formattedContent = computed(() => {
    // Convert line breaks to <br> tags for simple formatting
    return props.post.content.replace(/\n/g, '<br>');
});

const confirmDelete = () => {
    if (confirm('Are you sure you want to delete this blog post?')) {
        router.delete(route('admin.blog.destroy', props.post.id));
    }
};
</script>
