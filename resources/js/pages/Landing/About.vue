<template>
    <MainLayout>
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold mb-6">About Tatjana's Hub</h1>

            <div class="bg-white shadow rounded-lg p-6 mb-8">
                <h2 class="text-2xl font-bold mb-4">Our Mission</h2>
                <p class="text-gray-700 mb-4">
                    Tatjana's Hub was created to simplify the complex world of online presence management.
                    Our mission is to provide a centralized platform that allows you to manage your brand identity,
                    social media accounts, and marketplace listings all from one place - without the stress of
                    having to navigate multiple platforms and interfaces.
                </p>
                <p class="text-gray-700">
                    We believe that everyone deserves a streamlined, stress-free way to manage their online presence,
                    whether you're a creative professional, entrepreneur, or anyone with a product or service to share with the world.
                </p>
            </div>

            <div class="bg-white shadow rounded-lg p-6 mb-8">
                <h2 class="text-2xl font-bold mb-4">Our Story</h2>
                <p class="text-gray-700 mb-4">
                    Tatjana's Hub began when our founder, Tatjana, found herself overwhelmed by the need to maintain
                    multiple online platforms for her creative business. The stress of logging into different accounts,
                    remembering various passwords, and maintaining a consistent brand identity across platforms became too much.
                </p>
                <p class="text-gray-700">
                    That's when the idea for a central hub was born - a single platform that would allow Tatjana
                    and others like her to manage everything from one intuitive dashboard, reducing stress and freeing
                    up time for what really matters: creativity and connection.
                </p>
            </div>

            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Our Values</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <h3 class="text-xl font-bold mb-2">Simplicity</h3>
                        <p class="text-gray-700">
                            We believe in making things as simple and intuitive as possible, removing complexity and stress from your online management.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-2">Empowerment</h3>
                        <p class="text-gray-700">
                            We're committed to empowering you with the tools and knowledge to take control of your online presence.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-2">Connection</h3>
                        <p class="text-gray-700">
                            We value meaningful connections and believe your online presence should help you connect authentically with your audience.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<script setup>
import MainLayout from '@/layouts/MainLayout.vue';
</script>
