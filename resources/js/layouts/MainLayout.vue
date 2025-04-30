<template>
    <div class="min-h-screen bg-gray-50 flex flex-col">
        <!-- Header with animated accent -->
        <header class="bg-white shadow sticky top-0 z-40">
            <div class="container mx-auto px-4">
                <div class="py-4">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-6">
                            <Link :href="route('home')" class="text-xl font-bold text-gray-900 relative group">
                                Tatjana's Hub
                                <span class="block h-1 w-8 bg-gradient-to-r from-purple-400 to-blue-400 rounded-full mt-1 transition-all duration-500 group-hover:w-full"></span>
                            </Link>
                            <nav class="hidden md:flex space-x-1">
                                <Button
                                    @click="router.visit(route('home'))"
                                    variant="ghost"
                                    :class="{'bg-gray-100': route().current('home')}"
                                >
                                    Home
                                </Button>
                                <Button
                                    @click="router.visit(route('blog.index'))"
                                    variant="ghost"
                                    :class="{'bg-gray-100': route().current('blog.index')}"
                                >
                                    Blog
                                </Button>
                                <Button
                                    @click="router.visit(route('about'))"
                                    variant="ghost"
                                    :class="{'bg-gray-100': route().current('about')}"
                                >
                                    About
                                </Button>
                                <Button
                                    @click="router.visit(route('contact'))"
                                    variant="ghost"
                                    :class="{'bg-gray-100': route().current('contact')}"
                                >
                                    Contact
                                </Button>
                            </nav>
                        </div>

                        <!-- Desktop Auth -->
                        <div class="hidden md:block">
                            <Button
                                v-if="authUser"
                                as="Link"
                                :href="route('admin.dashboard')"
                                variant="outline"
                                class="mr-2"
                            >
                                <UserCircle class="mr-2 h-4 w-4" />
                                Admin Dashboard
                            </Button>
                            <Button
                                v-else
                                as="Link"
                                :href="route('login')"
                                variant="default"
                            >
                                <LogIn class="mr-2 h-4 w-4" />
                                Login
                            </Button>
                        </div>

                        <!-- Mobile Nav -->
                        <div class="md:hidden">
                            <Sheet>
                                <SheetTrigger asChild>
                                    <Button variant="ghost" size="icon">
                                        <Menu class="h-6 w-6" />
                                    </Button>
                                </SheetTrigger>
                                <SheetContent side="right" class="w-[300px] sm:w-[400px]">
                                    <SheetHeader>
                                        <SheetTitle>Tatjana's Hub</SheetTitle>
                                        <SheetDescription>Navigation Menu</SheetDescription>
                                    </SheetHeader>
                                    <div class="py-6">
                                        <nav class="flex flex-col space-y-4">
                                            <Button
                                                @click="router.visit(route('home'))"
                                                variant="ghost"
                                                class="justify-start"
                                                :class="{'bg-gray-100': route().current('home')}"
                                            >
                                                <Home class="mr-2 h-5 w-5" />
                                                Home
                                            </Button>
                                            <Button
                                                @click="router.visit(route('blog.index'))"
                                                variant="ghost"
                                                class="justify-start"
                                                :class="{'bg-gray-100': route().current('blog.index')}"
                                            >
                                                <BookOpen class="mr-2 h-5 w-5" />
                                                Blog
                                            </Button>
                                            <Button
                                                @click="router.visit(route('about'))"
                                                variant="ghost"
                                                class="justify-start"
                                                :class="{'bg-gray-100': route().current('about')}"
                                            >
                                                <Info class="mr-2 h-5 w-5" />
                                                About
                                            </Button>
                                            <Button
                                                @click="router.visit(route('contact'))"
                                                variant="ghost"
                                                class="justify-start"
                                                :class="{'bg-gray-100': route().current('contact')}"
                                            >
                                                <MessageSquare class="mr-2 h-5 w-5" />
                                                Contact
                                            </Button>

                                            <Separator />

                                            <Button
                                                v-if="authUser"
                                                @click="router.visit(route('admin.dashboard'))"
                                                variant="outline"
                                                class="justify-start"
                                            >
                                                <UserCircle class="mr-2 h-5 w-5" />
                                                Admin Dashboard
                                            </Button>
                                            <Button
                                                v-else
                                                @click="router.visit(route('login'))"
                                                variant="default"
                                                class="justify-start"
                                            >
                                                <LogIn class="mr-2 h-5 w-5" />
                                                Login
                                            </Button>
                                        </nav>
                                    </div>
                                </SheetContent>
                            </Sheet>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Animated header accent -->
            <div class="h-1 bg-gradient-to-r from-purple-300 via-pink-200 to-blue-300 animate-gradient-x"></div>
        </header>

        <main class="flex-1">
            <div class="py-8">
                <slot />
            </div>
        </main>

        <!-- Footer with decorative SVG accent -->
        <footer class="bg-white shadow mt-auto relative">
            <div class="absolute left-0 right-0 top-0 h-2 pointer-events-none">
                <svg width="100%" height="100%" viewBox="0 0 1440 40" fill="none">
                    <path d="M0,20 Q720,60 1440,20 L1440,40 L0,40 Z" fill="url(#footerGradient)" />
                    <defs>
                        <linearGradient id="footerGradient" x1="0" y1="0" x2="1440" y2="40" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#D8B4FE"/>
                            <stop offset="1" stop-color="#60A5FA"/>
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <div class="container mx-auto px-4">
                <div class="py-6 relative">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <p class="text-gray-600 mb-4 md:mb-0">
                            © {{ year }} Tatjana's Hub. All rights reserved.
                        </p>
                        <div class="flex space-x-3">
                            <Button variant="ghost" size="icon" class="rounded-full h-10 w-10">
                                <Facebook class="h-5 w-5" />
                            </Button>
                            <Button variant="ghost" size="icon" class="rounded-full h-10 w-10">
                                <Instagram class="h-5 w-5" />
                            </Button>
                            <Button variant="ghost" size="icon" class="rounded-full h-10 w-10">
                                <Twitter class="h-5 w-5" />
                            </Button>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<script setup lang="ts">
import { computed } from 'vue';
import { Link, usePage, router } from '@inertiajs/vue3';
import {
    Menu,
    Home,
    BookOpen,
    Info,
    MessageSquare,
    LogIn,
    UserCircle,
    Facebook,
    Instagram,
    Twitter
} from 'lucide-vue-next';

import { Button } from '@/components/ui/button';
import { Separator } from '@/components/ui/separator';
import {
    Sheet,
    SheetContent,
    SheetDescription,
    SheetHeader,
    SheetTitle,
    SheetTrigger,
} from '@/components/ui/sheet';

const $page = usePage();
const authUser = computed(() => $page.props.auth?.user);
const year = new Date().getFullYear();
</script>

<style scoped>
.animate-gradient-x {
    background-size: 200% 100%;
    animation: gradient-x 6s ease-in-out infinite;
}
@keyframes gradient-x {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}
</style>
