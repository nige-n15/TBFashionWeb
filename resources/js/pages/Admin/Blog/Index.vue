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

<!-- resources/js/Pages/Admin/Blog/Index.vue -->
<template>
    <AdminLayout>
        <template #header>Blog Posts</template>

        <div class="mb-6 flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold">Manage Blog Posts</h2>
                <p class="text-gray-600">Create, edit, and publish blog posts to your website.</p>
            </div>
            <Link :href="route('admin.blog.create')" class="bg-blue-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700">
                Create New Post
            </Link>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Date
                    </th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="post in posts.data" :key="post.id">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ post.title }}</div>
                        <div class="text-sm text-gray-500">{{ post.slug }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                    :class="post.published ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'">
                {{ post.published ? 'Published' : 'Draft' }}
              </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ post.published_at ? new Date(post.published_at).toLocaleDateString() : 'Not published' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <Link :href="route('admin.blog.edit', post.id)" class="text-indigo-600 hover:text-indigo-900 mr-3">
                            Edit
                        </Link>
                        <Link v-if="post.published" :href="route('blog.show', post.slug)" class="text-green-600 hover:text-green-900 mr-3">
                            View
                        </Link>
                        <button @click="confirmDelete(post)" class="text-red-600 hover:text-red-900">
                            Delete
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div v-if="posts.links.length > 3" class="mt-4 flex justify-center">
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
    </AdminLayout>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3';
import AdminLayout from '@/layouts/AdminLayout.vue';

defineProps({
    posts: Object,
});

const confirmDelete = (post) => {
    if (confirm(`Are you sure you want to delete "${post.title}"?`)) {
        router.delete(route('admin.blog.destroy', post.id));
    }
};
</script>
