<template>
    <div class="min-h-screen flex bg-gray-100">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-md">
            <div class="p-4 border-b">
                <Link :href="route('home')" class="text-xl font-bold text-gray-900">
                    Tatjana's Hub
                </Link>
            </div>
            <nav class="mt-6">
                <Link :href="route('admin.dashboard')" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100 hover:text-gray-900" :class="{ 'bg-gray-100 text-gray-900': route().current('admin.dashboard') }">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Dashboard
                </Link>
                <Link :href="route('admin.blog.index')" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100 hover:text-gray-900" :class="{ 'bg-gray-100 text-gray-900': route().current('admin.blog.*') }">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                    Blog Posts
                </Link>
                <Link :href="route('admin.social-media.index')" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100 hover:text-gray-900" :class="{ 'bg-gray-100 text-gray-900': route().current('admin.social-media.*') }">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    Social Media
                </Link>
                <Link :href="route('admin.marketplace.index')" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100 hover:text-gray-900" :class="{ 'bg-gray-100 text-gray-900': route().current('admin.marketplace.*') }">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    Marketplace
                </Link>
                <Link :href="route('admin.platforms.index')" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100 hover:text-gray-900" :class="{ 'bg-gray-100 text-gray-900': route().current('admin.platforms.*') }">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Platform Settings
                </Link>
                <hr class="my-6 border-gray-200" />
                <form @submit.prevent="logout" class="px-6">
                    <button type="submit" class="w-full flex items-center py-3 text-gray-600 hover:text-gray-900">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        Logout
                    </button>
                </form>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white shadow">
                <div class="px-6 py-4">
                    <h1 class="text-xl font-bold text-gray-900">
                        <slot name="header">Dashboard</slot>
                    </h1>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-6 bg-gray-100">
                <slot />
            </main>
        </div>
    </div>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3';

const logout = () => {
    router.post(route('logout'));
};
</script>
