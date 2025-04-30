<template>
    <AdminLayout>
        <template #header>Marketplace</template>

        <div class="mb-6 flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold">Manage Marketplace Listings</h2>
                <p class="text-gray-600">Create and manage listings across multiple marketplace platforms.</p>
            </div>
            <Link :href="route('admin.marketplace.create')" class="bg-blue-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700">
                Create Listing
            </Link>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6 lg:col-span-2">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Recent Listings</h3>

                <div v-if="listings.data.length > 0" class="space-y-4">
                    <div v-for="listing in listings.data" :key="listing.id" class="border rounded-lg overflow-hidden">
                        <div class="flex flex-col md:flex-row">
                            <div class="w-full md:w-1/3 h-48">
                                <img v-if="listing.media && listing.media.length > 0" :src="`/storage/${listing.media[0]}`" :alt="listing.title" class="w-full h-full object-cover">
                                <div v-else class="w-full h-full bg-gray-200 flex items-center justify-center">
                                    <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="p-4 w-full md:w-2/3">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h4 class="text-lg font-bold text-gray-900">{{ listing.title }}</h4>
                                        <p v-if="listing.metadata" class="text-green-600 font-bold mt-1">
                                            {{ listing.metadata.currency }} {{ listing.metadata.price }}
                                        </p>
                                        <p class="text-gray-700 mt-2">{{ listing.content.substring(0, 100) }}...</p>
                                    </div>
                                    <div class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-semibold rounded-full">
                                        {{ listing.platform.platform_name }}
                                    </div>
                                </div>
                                <div class="mt-4 flex justify-between items-center text-sm">
                                    <p class="text-gray-500">
                                        Listed on {{ new Date(listing.published_at).toLocaleDateString() }}
                                    </p>
                                    <p v-if="listing.metadata && listing.metadata.status" class="px-2 py-1 bg-green-100 text-green-800 rounded">
                                        {{ listing.metadata.status }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-else class="text-center py-8">
                    <p class="text-gray-600">No listings yet. Create your first marketplace listing!</p>
                </div>

                <!-- Pagination -->
                <div v-if="listings.links && listings.links.length > 3" class="mt-6 flex justify-center">
                    <div class="flex space-x-1">
                        <Link
                            v-for="(link, i) in listings.links"
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
                    <p class="text-gray-600">No marketplace platforms connected yet.</p>
                </div>

                <div class="mt-4">
                    <Link :href="route('admin.platforms.index')" class="text-blue-600 hover:underline">
                        Manage Platform Connections
                    </Link>
                </div>

                <hr class="my-6" />

                <h3 class="text-lg font-bold text-gray-900 mb-4">Quick Stats</h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Total Listings</span>
                        <span class="font-bold">{{ listings.total || 0 }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Active Listings</span>
                        <span class="font-bold">{{ activeListingsCount }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Platforms</span>
                        <span class="font-bold">{{ platforms.length }}</span>
                    </div>
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
    platforms: Array,
    listings: Object,
});

const activeListingsCount = computed(() => {
    if (!props.listings.data) return 0;
    return props.listings.data.filter(listing =>
        listing.metadata && listing.metadata.status === 'active'
    ).length;
});
</script>
