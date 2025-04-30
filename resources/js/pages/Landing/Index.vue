<template>
    <MainLayout>
        <!-- Hero Section with Fashion-Forward Design -->
        <section class="relative py-16 md:py-24 overflow-hidden">
            <!-- Background - more refined, textile-inspired pattern -->
            <div class="absolute inset-0 bg-gray-50" style="background-image: url('/storage/pattern.png'); background-size: 100px; background-position: center; opacity: 0.07;"></div>

            <div class="container px-4 mx-auto relative z-10">
                <div class="flex flex-col-reverse lg:flex-row items-center">
                    <!-- Text Content - More fashion-forward typography -->
                    <div class="lg:w-1/2 text-center lg:text-left mt-10 lg:mt-0">
                        <div class="mb-2 text-gray-500 uppercase tracking-widest text-xs font-medium">Fashion Designer Portfolio</div>
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-light mb-6 text-gray-900 leading-tight tracking-tighter">
                            TATJANA <span class="font-normal">BLECKER</span>
                        </h1>
                        <div class="h-px w-24 bg-gray-400 mb-6 mx-auto lg:mx-0"></div>
                        <p class="text-lg text-gray-700 mb-8 max-w-xl mx-auto lg:mx-0 leading-relaxed">
                            Innovative fashion design exploring material contrasts,
                            asymmetric forms, and sophisticated textile manipulation.
                        </p>
                        <div class="flex flex-wrap gap-4 justify-center lg:justify-start">
                            <Button size="lg" class="bg-gray-900 hover:bg-gray-800 text-white px-8 py-2 uppercase tracking-wider font-normal text-sm">
                                Explore Collections
                            </Button>
                            <Button variant="outline" size="lg" class="border-gray-400 text-gray-700 hover:bg-gray-100 px-8 py-2 uppercase tracking-wider font-normal text-sm">
                                About Designer
                            </Button>
                        </div>
                    </div>

                    <!-- Main Image - Using the portfolio images as inspiration -->
                    <div class="lg:w-1/2 flex justify-center">
                        <div class="relative">
                            <!-- Key fashion image from portfolio -->
                            <div class="shadow-lg">
                                <img
                                    src="/storage/logo.png"
                                    alt="Tatjana Blecker Fashion Design"
                                    class="max-w-full h-auto"
                                    style="max-height: 600px;"
                                />
                                <!-- Subtle overlay for depth -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent"></div>
                            </div>

                            <!-- Small material swatch - inspired by her fabric choices -->
                            <div class="absolute -bottom-6 -right-6 h-24 w-36 bg-gray-800 shadow-xl"></div>
                            <div class="absolute -bottom-4 -right-4 h-24 w-36 bg-gray-200 shadow-xl"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Collections Section with Material Focus -->
        <section class="py-16 relative overflow-hidden">
            <!-- Minimal, fashion-forward background -->
            <div class="absolute inset-0 bg-white"></div>
            <!-- Asymmetric accent line - inspired by Tatjana's design aesthetic -->
            <div class="absolute left-0 top-24 w-1/3 h-px bg-gray-300"></div>
            <div class="absolute right-0 bottom-24 w-1/2 h-px bg-gray-300"></div>

            <div class="container px-4 mx-auto relative z-10">
                <div class="flex items-end justify-between mb-16">
                    <div>
                        <div class="text-gray-500 uppercase tracking-widest text-xs font-medium mb-2">Selected Works</div>
                        <h2 class="text-3xl font-light tracking-tight text-gray-900">
                            Collection <span class="font-normal">Highlights</span>
                        </h2>
                    </div>
                    <div class="hidden md:block">
                        <div class="h-px w-24 bg-gray-300"></div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                    <!-- Collection 1: Urban Friction -->
                    <Card class="bg-white border-0 shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden group">
                        <div class="aspect-square bg-gray-100 overflow-hidden">
                            <img
                                src="/storage/splash.png"
                                alt="Urban Friction Collection"
                                class="h-full w-full object-cover transition-all duration-700 group-hover:scale-105"
                            />
                        </div>
                        <CardContent class="p-6">
                            <div>
                                <h3 class="font-medium text-xl text-gray-900 mb-1">Urban Friction</h3>
                                <p class="text-gray-600 text-sm mb-4">Jersey, draped elements, Chinese jacquard</p>
                                <div class="flex space-x-2 mb-4">
                                    <div class="w-4 h-4 rounded-full bg-gray-900" title="Raven"></div>
                                    <div class="w-4 h-4 rounded-full bg-gray-500" title="Steel"></div>
                                    <div class="w-4 h-4 rounded-full bg-gray-300" title="Concrete"></div>
                                </div>
                                <Button variant="ghost" class="text-gray-900 hover:text-gray-700 p-0 uppercase text-xs tracking-wider">
                                    View Collection →
                                </Button>
                            </div>
                        </CardContent>
                    </Card>

                    <!-- Collection 2: Asian Line -->
                    <Card class="bg-white border-0 shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden group">
                        <div class="aspect-square bg-gray-100 overflow-hidden">
                            <img
                                src="/storage/splash.png"
                                alt="Asian Line Collection"
                                class="h-full w-full object-cover transition-all duration-700 group-hover:scale-105"
                            />
                        </div>
                        <CardContent class="p-6">
                            <div>
                                <h3 class="font-medium text-xl text-gray-900 mb-1">Asian Line</h3>
                                <p class="text-gray-600 text-sm mb-4">Floral prints, asymmetric elements, silk</p>
                                <div class="flex space-x-2 mb-4">
                                    <div class="w-4 h-4 rounded-full bg-green-800" title="Moss"></div>
                                    <div class="w-4 h-4 rounded-full bg-blue-900" title="Ocean"></div>
                                    <div class="w-4 h-4 rounded-full bg-amber-800" title="Ember"></div>
                                </div>
                                <Button variant="ghost" class="text-gray-900 hover:text-gray-700 p-0 uppercase text-xs tracking-wider">
                                    View Collection →
                                </Button>
                            </div>
                        </CardContent>
                    </Card>

                    <!-- Collection 3: All Saints Men -->
                    <Card class="bg-white border-0 shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden group">
                        <div class="aspect-square bg-gray-100 overflow-hidden">
                            <img
                                src="/storage/splash.png"
                                alt="All Saints Men Collection"
                                class="h-full w-full object-cover transition-all duration-700 group-hover:scale-105"
                            />
                        </div>
                        <CardContent class="p-6">
                            <div>
                                <h3 class="font-medium text-xl text-gray-900 mb-1">All Saints Men</h3>
                                <p class="text-gray-600 text-sm mb-4">Knitwear, mix & match, merino, wool, cotton</p>
                                <div class="flex space-x-2 mb-4">
                                    <div class="w-4 h-4 rounded-full bg-red-900" title="Ruby"></div>
                                    <div class="w-4 h-4 rounded-full bg-gray-900" title="Raven"></div>
                                    <div class="w-4 h-4 rounded-full bg-gray-400" title="Steel"></div>
                                </div>
                                <Button variant="ghost" class="text-gray-900 hover:text-gray-700 p-0 uppercase text-xs tracking-wider">
                                    View Collection →
                                </Button>
                            </div>
                        </CardContent>
                    </Card>
                </div>
            </div>
        </section>

        <!-- Design Philosophy Section -->
        <section class="py-16 md:py-24 relative bg-gray-100">
            <div class="container px-4 mx-auto relative z-10">
                <div class="flex flex-col lg:flex-row items-center gap-12">
                    <!-- Design Philosophy Text -->
                    <div class="lg:w-1/2">
                        <div class="text-gray-500 uppercase tracking-widest text-xs font-medium mb-2">Design Approach</div>
                        <h2 class="text-3xl font-light tracking-tight text-gray-900 mb-6">
                            Material <span class="font-normal">Innovation</span>
                        </h2>
                        <div class="h-px w-24 bg-gray-400 mb-6"></div>

                        <div class="space-y-8">
                            <!-- Design Feature 1 -->
                            <div class="flex items-start">
                                <div class="mr-4 mt-1">
                                    <div class="w-6 h-px bg-gray-400"></div>
                                </div>
                                <div>
                                    <h3 class="font-medium text-xl text-gray-900 mb-2">Textile Manipulation</h3>
                                    <p class="text-gray-600">
                                        Creating fluid, sculptural forms through expert draping techniques and smoked elements
                                        that challenge conventional silhouettes.
                                    </p>
                                </div>
                            </div>

                            <!-- Design Feature 2 -->
                            <div class="flex items-start">
                                <div class="mr-4 mt-1">
                                    <div class="w-6 h-px bg-gray-400"></div>
                                </div>
                                <div>
                                    <h3 class="font-medium text-xl text-gray-900 mb-2">Material Contrast</h3>
                                    <p class="text-gray-600">
                                        Exploring the interplay between different textures and fabrics—jersey, cashmere,
                                        silk, and Chinese jacquard—to create visual and tactile interest.
                                    </p>
                                </div>
                            </div>

                            <!-- Design Feature 3 -->
                            <div class="flex items-start">
                                <div class="mr-4 mt-1">
                                    <div class="w-6 h-px bg-gray-400"></div>
                                </div>
                                <div>
                                    <h3 class="font-medium text-xl text-gray-900 mb-2">Asymmetric Construction</h3>
                                    <p class="text-gray-600">
                                        Embracing asymmetry in collars, pockets, and overall garment construction
                                        to create distinctive, avant-garde silhouettes.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Material Showcase -->
                    <div class="lg:w-1/2 flex justify-center">
                        <div class="relative">
                            <!-- Main textiles image -->
                            <div class="shadow-lg">
                                <img
                                    src="/storage/splash.png"
                                    alt="Tatjana Blecker Material Innovation"
                                    class="max-w-full h-auto rounded-none"
                                    style="max-height: 500px;"
                                />
                            </div>

                            <!-- Material swatches - inspired by her fabric palette -->
                            <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-gray-900 shadow-xl"></div>
                            <div class="absolute -bottom-3 -left-3 w-32 h-32 bg-gray-100 shadow-xl flex items-center justify-center">
                                <div class="text-xs uppercase tracking-wider text-gray-500 rotate-90">Materials</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Newsletter Section - More minimal and fashion-forward -->
        <section class="py-16 bg-white">
            <div class="container px-4 mx-auto">
                <div class="max-w-xl mx-auto">
                    <div class="text-center mb-4">
                        <div class="text-gray-500 uppercase tracking-widest text-xs font-medium mb-2">Stay Connected</div>
                        <h2 class="text-3xl font-light text-gray-900 mb-4">Subscribe to Updates</h2>
                        <div class="h-px w-12 bg-gray-400 mx-auto mb-6"></div>
                    </div>

                    <form @submit.prevent="onSubscribe" class="space-y-4">
                        <div class="flex flex-col sm:flex-row gap-2">
                            <Input
                                v-model="subscribeEmail"
                                type="email"
                                placeholder="Enter your email"
                                class="flex-1 focus:ring-gray-900 focus:border-gray-900"
                            />
                            <Button type="submit" class="bg-gray-900 hover:bg-gray-800 text-white uppercase tracking-wider text-xs font-normal">
                                Subscribe
                            </Button>
                        </div>
                        <p class="text-sm text-gray-500 text-center">Subscribe to receive updates on new collections and exhibitions.</p>
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
/* Clean transitions for images */
img {
    transition: transform 0.7s ease;
}

.group:hover img {
    transform: scale(1.03);
}

/* Style additions */
.text-gradient {
    background-clip: text;
    -webkit-background-clip: text;
    color: transparent;
    background-image: linear-gradient(to right, #1a202c, #4a5568);
}
</style>
