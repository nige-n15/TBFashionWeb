<template>
    <MainLayout>
        <!-- Hero Section with Main Illustration -->
        <section class="relative py-16 md:py-24 overflow-hidden">
            <!-- Background Pattern (subtle version of the blue illustration) -->
            <div class="absolute inset-0 bg-blue-50 opacity-10" style="background-image: url('/storage/pattern.png'); background-size: cover; background-position: center; mix-blend-mode: multiply;"></div>

            <!-- Stars Animation (optional - can be added with CSS) -->
            <div class="absolute inset-0 stars-animation"></div>

            <div class="container px-4 mx-auto relative z-10">
                <div class="flex flex-col-reverse lg:flex-row items-center">
                    <!-- Text Content -->
                    <div class="lg:w-1/2 text-center lg:text-left mt-10 lg:mt-0">
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 text-gray-900 leading-tight">
                            Welcome to <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">Tatjana's</span> Fashion World
                        </h1>
                        <p class="text-xl text-gray-700 mb-8 max-w-xl mx-auto lg:mx-0">
                            Explore a dreamy universe of fashion where creativity meets elegance, and every design tells a story.
                        </p>
                        <div class="flex flex-wrap gap-4 justify-center lg:justify-start">
                            <Button size="lg" class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white">
                                <SparklesIcon class="mr-2 h-5 w-5" /> Explore Collections
                            </Button>
                            <Button variant="outline" size="lg" class="border-blue-600 text-blue-600 hover:bg-blue-50">
                                <BookOpenIcon class="mr-2 h-5 w-5" /> Our Story
                            </Button>
                        </div>
                    </div>

                    <!-- Main Illustration -->
                    <div class="lg:w-1/2 flex justify-center">
                        <div class="relative">
                            <!-- Floating animation for the image -->
                            <div class="animate-float">
                                <img
                                    src="/storage/logo.png"
                                    alt="Tatjana Blecker Fashion Illustration"
                                    class="max-w-full h-auto rounded-2xl shadow-2xl"
                                    style="max-height: 500px;"
                                />
                            </div>

                            <!-- Decorative elements -->
                            <div class="absolute -top-10 -right-10 h-20 w-20 text-yellow-400 animate-pulse-slow">
                                <StarIcon class="h-full w-full" />
                            </div>
                            <div class="absolute -bottom-8 -left-8 h-16 w-16 text-yellow-400 animate-pulse-slow delay-300">
                                <SparklesIcon class="h-full w-full" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Collections Section with Second Illustration -->
        <section class="py-16 relative overflow-hidden">
            <!-- Custom blue gradient background inspired by the illustrations -->
            <div class="absolute inset-0 bg-gradient-to-b from-blue-50 to-blue-100"></div>

            <div class="container px-4 mx-auto relative z-10">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-900">Featured Collections</h2>
                    <div class="h-1 w-24 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full mx-auto"></div>
                </div>

                <div class="flex flex-col lg:flex-row items-center gap-16">
                    <!-- Second Illustration -->
                    <div class="lg:w-2/5 flex justify-center">
                        <div class="relative">
                            <img
                                src="/storage/splash.png"
                                alt="Blue Donut Cake"
                                class="max-w-full h-auto rounded-full shadow-xl"
                                style="max-height: 400px;"
                            />
                            <!-- Glow effect behind the image -->
                            <div class="absolute -inset-4 bg-blue-400 rounded-full blur-2xl opacity-20 -z-10"></div>
                        </div>
                    </div>

                    <!-- Featured Collections List -->
                    <div class="lg:w-3/5">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Collection 1 -->
                            <Card class="bg-white/90 backdrop-blur-sm border border-blue-100 hover:shadow-md transition-all duration-300">
                                <CardContent class="p-6">
                                    <div class="flex items-start">
                                        <div class="bg-blue-100 p-3 rounded-full mr-4">
                                            <CakeIcon class="h-6 w-6 text-blue-600" />
                                        </div>
                                        <div>
                                            <h3 class="font-bold text-lg text-gray-900 mb-2">Sweet Dreams</h3>
                                            <p class="text-gray-700 mb-3">Our signature collection inspired by confectionery and dreamy desserts.</p>
                                            <Button variant="ghost" class="text-blue-600 hover:text-blue-800 p-0">
                                                View Collection →
                                            </Button>
                                        </div>
                                    </div>
                                </CardContent>
                            </Card>

                            <!-- Collection 2 -->
                            <Card class="bg-white/90 backdrop-blur-sm border border-blue-100 hover:shadow-md transition-all duration-300">
                                <CardContent class="p-6">
                                    <div class="flex items-start">
                                        <div class="bg-purple-100 p-3 rounded-full mr-4">
                                            <MoonIcon class="h-6 w-6 text-purple-600" />
                                        </div>
                                        <div>
                                            <h3 class="font-bold text-lg text-gray-900 mb-2">Midnight Magic</h3>
                                            <p class="text-gray-700 mb-3">Elegant eveningwear inspired by starry nights and moonlit adventures.</p>
                                            <Button variant="ghost" class="text-blue-600 hover:text-blue-800 p-0">
                                                View Collection →
                                            </Button>
                                        </div>
                                    </div>
                                </CardContent>
                            </Card>

                            <!-- Collection 3 -->
                            <Card class="bg-white/90 backdrop-blur-sm border border-blue-100 hover:shadow-md transition-all duration-300">
                                <CardContent class="p-6">
                                    <div class="flex items-start">
                                        <div class="bg-yellow-100 p-3 rounded-full mr-4">
                                            <StarIcon class="h-6 w-6 text-yellow-600" />
                                        </div>
                                        <div>
                                            <h3 class="font-bold text-lg text-gray-900 mb-2">Stardust</h3>
                                            <p class="text-gray-700 mb-3">Shimmering pieces adorned with magical elements that catch the light.</p>
                                            <Button variant="ghost" class="text-blue-600 hover:text-blue-800 p-0">
                                                View Collection →
                                            </Button>
                                        </div>
                                    </div>
                                </CardContent>
                            </Card>

                            <!-- Collection 4 -->
                            <Card class="bg-white/90 backdrop-blur-sm border border-blue-100 hover:shadow-md transition-all duration-300">
                                <CardContent class="p-6">
                                    <div class="flex items-start">
                                        <div class="bg-teal-100 p-3 rounded-full mr-4">
                                            <CloudIcon class="h-6 w-6 text-teal-600" />
                                        </div>
                                        <div>
                                            <h3 class="font-bold text-lg text-gray-900 mb-2">Cloud Nine</h3>
                                            <p class="text-gray-700 mb-3">Lightweight, floaty garments that embody comfort and ethereal beauty.</p>
                                            <Button variant="ghost" class="text-blue-600 hover:text-blue-800 p-0">
                                                View Collection →
                                            </Button>
                                        </div>
                                    </div>
                                </CardContent>
                            </Card>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Fantasy World Section with Third Illustration -->
        <section class="py-16 md:py-24 relative">
            <!-- Blue mystical background inspired by the third illustration -->
            <div class="absolute inset-0 bg-blue-900 opacity-95">
                <!-- Optional: Add subtle stars or particles as a background pattern -->
            </div>

            <div class="container px-4 mx-auto relative z-10">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-white">Enter Our Fantasy World</h2>
                    <p class="text-xl text-blue-100 max-w-2xl mx-auto">
                        Where fashion meets fantasy, and each design transports you to a magical realm.
                    </p>
                    <div class="h-1 w-24 bg-gradient-to-r from-yellow-400 to-yellow-600 rounded-full mx-auto mt-6"></div>
                </div>

                <div class="flex flex-col-reverse lg:flex-row items-center gap-12">
                    <!-- World Description -->
                    <div class="lg:w-1/2">
                        <div class="space-y-8">
                            <!-- World Feature 1 -->
                            <div class="bg-blue-800/50 backdrop-blur-sm rounded-xl p-6 transform transition-all duration-300 hover:scale-105">
                                <div class="flex items-start">
                                    <div class="bg-yellow-500/20 p-3 rounded-full mr-4">
                                        <SparklesIcon class="h-6 w-6 text-yellow-400" />
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-xl text-yellow-400 mb-2">Magical Materials</h3>
                                        <p class="text-blue-100">
                                            Our fabrics are sourced from the finest ateliers and enchanted with a touch of magic to create unique textures and effects.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- World Feature 2 -->
                            <div class="bg-blue-800/50 backdrop-blur-sm rounded-xl p-6 transform transition-all duration-300 hover:scale-105">
                                <div class="flex items-start">
                                    <div class="bg-yellow-500/20 p-3 rounded-full mr-4">
                                        <WandIcon class="h-6 w-6 text-yellow-400" />
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-xl text-yellow-400 mb-2">Artisanal Craftsmanship</h3>
                                        <p class="text-blue-100">
                                            Each piece is meticulously handcrafted by our skilled artisans who infuse their work with passion and imagination.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- World Feature 3 -->
                            <div class="bg-blue-800/50 backdrop-blur-sm rounded-xl p-6 transform transition-all duration-300 hover:scale-105">
                                <div class="flex items-start">
                                    <div class="bg-yellow-500/20 p-3 rounded-full mr-4">
                                        <PaintbrushIcon class="h-6 w-6 text-yellow-400" />
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-xl text-yellow-400 mb-2">Exclusive Designs</h3>
                                        <p class="text-blue-100">
                                            Our designs are limited edition, ensuring that your piece is as unique as the magical world that inspired it.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Third Illustration -->
                    <div class="lg:w-1/2 flex justify-center">
                        <div class="relative">
                            <img
                                src="/storage/splash.png"
                                alt="Fantasy Blue World"
                                class="max-w-full h-auto rounded-2xl shadow-2xl"
                                style="max-height: 500px;"
                            />

                            <!-- Interactive elements floating around the image -->
                            <div class="absolute -top-4 -right-4 h-12 w-12 text-yellow-400 animate-bounce-slow">
                                <MoonIcon class="h-full w-full" />
                            </div>
                            <div class="absolute -bottom-4 -left-4 h-12 w-12 text-yellow-400 animate-spin-slow">
                                <StarIcon class="h-full w-full" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Newsletter Section -->
        <section class="py-16 bg-gradient-to-r from-purple-50 to-blue-50">
            <div class="container px-4 mx-auto">
                <div class="max-w-xl mx-auto text-center">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Join Our Dreamworld</h2>
                    <p class="text-lg text-gray-700 mb-8">
                        Subscribe to our newsletter to receive the latest updates, exclusive offers, and a sprinkle of magic in your inbox.
                    </p>

                    <form @submit.prevent="onSubscribe" class="space-y-4">
                        <div class="flex flex-col sm:flex-row gap-2">
                            <Input
                                v-model="subscribeEmail"
                                type="email"
                                placeholder="Enter your email"
                                class="flex-1"
                            />
                            <Button type="submit" class="bg-gradient-to-r from-blue-600 to-purple-600 text-white">
                                <MailPlusIcon class="mr-2 h-4 w-4" />
                                Subscribe
                            </Button>
                        </div>
                        <p class="text-sm text-gray-500">We respect your privacy. Unsubscribe at any time.</p>
                    </form>
                </div>
            </div>
        </section>
    </MainLayout>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';
import MainLayout from '@/layouts/MainLayout.vue';
import {
    SparklesIcon,
    BookOpenIcon,
    StarIcon,
    MoonIcon,
    CloudIcon,
    CakeIcon,
    WandIcon,
    PaintbrushIcon,
    MailPlusIcon
} from 'lucide-vue-next';

import { Card, CardContent } from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';

const subscribeEmail = ref('');

const onSubscribe = () => {
    // Here you would typically send the email to your backend
    console.log('Subscribe:', subscribeEmail.value);

    // Show success message
    alert('Thank you for subscribing to our newsletter!');

    // Reset form
    subscribeEmail.value = '';
};
</script>

<style scoped>
/* Floating animation for the main illustration */
.animate-float {
    animation: float 6s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
}

/* Slow pulse animation for stars */
.animate-pulse-slow {
    animation: pulse 4s ease-in-out infinite;
}

.delay-300 {
    animation-delay: 300ms;
}

@keyframes pulse {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.7; transform: scale(0.95); }
}

/* Slow spin animation */
.animate-spin-slow {
    animation: spin 12s linear infinite;
}

@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

/* Slow bounce animation */
.animate-bounce-slow {
    animation: bounce 3s ease-in-out infinite;
}

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

/* Stars animation background */
.stars-animation {
    background-image: radial-gradient(circle, rgba(255,255,255,0.2) 1px, transparent 1px);
    background-size: 50px 50px;
}
</style>
