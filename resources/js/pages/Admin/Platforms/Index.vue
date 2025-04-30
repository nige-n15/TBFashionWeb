<template>
    <AdminLayout>
        <template #header>Platform Connections</template>

        <div class="mb-6">
            <h2 class="text-2xl font-bold">Manage Platform Connections</h2>
            <p class="text-gray-600">Connect and configure all your social media and marketplace platforms.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Social Media Platforms -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="p-6 border-b">
                    <h3 class="text-lg font-bold text-gray-900">Social Media Platforms</h3>
                </div>

                <div v-if="socialPlatforms.length > 0" class="divide-y">
                    <div v-for="platform in socialPlatforms" :key="platform.id" class="p-6">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900">{{ platform.platform_name }}</h4>
                                    <p class="text-sm text-gray-500">
                                        {{ platform.active ? 'Connected' : 'Disconnected' }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <button
                                    class="px-3 py-1 border rounded-md text-sm mr-2"
                                    :class="platform.active ? 'border-red-300 text-red-700 hover:bg-red-50' : 'border-green-300 text-green-700 hover:bg-green-50'"
                                    @click="togglePlatformStatus(platform)"
                                >
                                    {{ platform.active ? 'Disconnect' : 'Connect' }}
                                </button>
                                <button class="text-blue-600 hover:text-blue-800" @click="editPlatform(platform)">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-else class="p-6 text-center">
                    <p class="text-gray-600">No social media platforms configured yet.</p>
                </div>

                <div class="p-6 border-t">
                    <button @click="addSocialPlatform" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Add Social Platform
                    </button>
                </div>
            </div>

            <!-- Marketplace Platforms -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="p-6 border-b">
                    <h3 class="text-lg font-bold text-gray-900">Marketplace Platforms</h3>
                </div>

                <div v-if="marketplacePlatforms.length > 0" class="divide-y">
                    <div v-for="platform in marketplacePlatforms" :key="platform.id" class="p-6">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center mr-3">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900">{{ platform.platform_name }}</h4>
                                    <p class="text-sm text-gray-500">
                                        {{ platform.active ? 'Connected' : 'Disconnected' }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <button
                                    class="px-3 py-1 border rounded-md text-sm mr-2"
                                    :class="platform.active ? 'border-red-300 text-red-700 hover:bg-red-50' : 'border-green-300 text-green-700 hover:bg-green-50'"
                                    @click="togglePlatformStatus(platform)"
                                >
                                    {{ platform.active ? 'Disconnect' : 'Connect' }}
                                </button>
                                <button class="text-blue-600 hover:text-blue-800" @click="editPlatform(platform)">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-else class="p-6 text-center">
                    <p class="text-gray-600">No marketplace platforms configured yet.</p>
                </div>

                <div class="p-6 border-t">
                    <button @click="addMarketplacePlatform" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Add Marketplace Platform
                    </button>
                </div>
            </div>
        </div>

        <!-- Platform Modal (would be implemented in a real application) -->
        <div v-if="showPlatformModal" class="fixed inset-0 overflow-y-auto">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    {{ editingPlatform ? 'Edit Platform' : 'Add Platform' }}
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        {{ editingPlatform ? 'Update your platform connection details.' : 'Connect a new platform to your hub.' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 space-y-4">
                            <div>
                                <label for="platform_name" class="block text-sm font-medium text-gray-700">Platform Name</label>
                                <input type="text" id="platform_name" v-model="platformForm.platform_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            </div>

                            <div>
                                <label for="platform_type" class="block text-sm font-medium text-gray-700">Platform Type</label>
                                <select id="platform_type" v-model="platformForm.platform_type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    <option value="social">Social Media</option>
                                    <option value="marketplace">Marketplace</option>
                                </select>
                            </div>

                            <div>
                                <label for="credentials_api_key" class="block text-sm font-medium text-gray-700">API Key</label>
                                <input type="password" id="credentials_api_key" v-model="platformForm.credentials.api_key" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            </div>

                            <div>
                                <label for="credentials_api_secret" class="block text-sm font-medium text-gray-700">API Secret</label>
                                <input type="password" id="credentials_api_secret" v-model="platformForm.credentials.api_secret" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            </div>

                            <div class="flex items-center">
                                <input type="checkbox" id="active" v-model="platformForm.active" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="active" class="ml-2 block text-sm text-gray-900">Active</label>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button @click="savePlatform" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Save
                        </button>
                        <button @click="closePlatformModal" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import { ref } from 'vue';
import { Link, router } from '@inertiajs/vue3';
import AdminLayout from '@/layouts/AdminLayout.vue';

const props = defineProps({
    socialPlatforms: Array,
    marketplacePlatforms: Array,
});

const showPlatformModal = ref(false);
const editingPlatform = ref(null);

const platformForm = ref({
    platform_name: '',
    platform_type: 'social',
    active: true,
    credentials: {
        api_key: '',
        api_secret: '',
        access_token: '',
        refresh_token: ''
    }
});

const addSocialPlatform = () => {
    editingPlatform.value = null;
    platformForm.value = {
        platform_name: '',
        platform_type: 'social',
        active: true,
        credentials: {
            api_key: '',
            api_secret: '',
            access_token: '',
            refresh_token: ''
        }
    };
    showPlatformModal.value = true;
};

const addMarketplacePlatform = () => {
    editingPlatform.value = null;
    platformForm.value = {
        platform_name: '',
        platform_type: 'marketplace',
        active: true,
        credentials: {
            api_key: '',
            api_secret: '',
            access_token: '',
            refresh_token: ''
        }
    };
    showPlatformModal.value = true;
};

const editPlatform = (platform) => {
    editingPlatform.value = platform;
    platformForm.value = {
        ...platform,
        credentials: { ...platform.credentials }
    };
    showPlatformModal.value = true;
};

const togglePlatformStatus = (platform) => {
    router.put(route('admin.platforms.toggle', platform.id), {
        active: !platform.active
    });
};

const savePlatform = () => {
    if (editingPlatform.value) {
        router.put(route('admin.platforms.update', editingPlatform.value.id), platformForm.value);
    } else {
        router.post(route('admin.platforms.store'), platformForm.value);
    }
    showPlatformModal.value = false;
};

const closePlatformModal = () => {
    showPlatformModal.value = false;
};
</script>
