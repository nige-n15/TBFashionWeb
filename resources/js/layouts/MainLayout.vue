<template>
    <div class="min-h-screen bg-gray-50 flex flex-col">
        <!-- Header with refined, fashion-forward styling -->
        <header class="bg-white shadow sticky top-0 z-40">
            <div class="container mx-auto px-4">
                <div class="py-4">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-8">
                            <Link :href="route('home')" class="text-xl font-light text-gray-900 relative group tracking-wider uppercase">
                                <span class="font-normal">TB</span> Studio
                                <span class="block h-px w-8 bg-gray-900 rounded-none mt-1 transition-all duration-500 group-hover:w-full"></span>
                            </Link>
                            <nav class="hidden md:flex space-x-6">
                                <Button
                                    @click="router.visit(route('home'))"
                                    variant="ghost"
                                    class="text-gray-700 hover:text-gray-900 uppercase tracking-wider text-xs font-normal"
                                    :class="{'text-gray-900 font-medium': route().current('home')}"
                                >
                                    Collections
                                </Button>
                                <Button
                                    @click="router.visit(route('blog.index'))"
                                    variant="ghost"
                                    class="text-gray-700 hover:text-gray-900 uppercase tracking-wider text-xs font-normal"
                                    :class="{'text-gray-900 font-medium': route().current('blog.index')}"
                                >
                                    Journal
                                </Button>
                                <Button
                                    @click="router.visit(route('about'))"
                                    variant="ghost"
                                    class="text-gray-700 hover:text-gray-900 uppercase tracking-wider text-xs font-normal"
                                    :class="{'text-gray-900 font-medium': route().current('about')}"
                                >
                                    About
                                </Button>
                                <Button
                                    @click="router.visit(route('contact'))"
                                    variant="ghost"
                                    class="text-gray-700 hover:text-gray-900 uppercase tracking-wider text-xs font-normal"
                                    :class="{'text-gray-900 font-medium': route().current('contact')}"
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
                                class="border-gray-300 text-gray-700 hover:border-gray-900 hover:text-gray-900 uppercase tracking-wider text-xs font-normal"
                            >
                                Admin
                            </Button>
                            <Button
                                v-else
                                as="Link"
                                :href="route('login')"
                                variant="default"
                                class="bg-gray-900 hover:bg-gray-800 text-white uppercase tracking-wider text-xs font-normal"
                            >
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
                                        <SheetTitle class="text-left font-light text-xl tracking-wider uppercase">
                                            <span class="font-normal">TB</span> Studio
                                        </SheetTitle>
                                        <div class="h-px w-16 bg-gray-400 mb-4"></div>
                                    </SheetHeader>
                                    <div class="py-6">
                                        <nav class="flex flex-col space-y-4">
                                            <Button
                                                @click="router.visit(route('home'))"
                                                variant="ghost"
                                                class="justify-start uppercase tracking-wider text-xs font-normal"
                                                :class="{'text-gray-900 font-medium': route().current('home')}"
                                            >
                                                Collections
                                            </Button>
                                            <Button
                                                @click="router.visit(route('blog.index'))"
                                                variant="ghost"
                                                class="justify-start uppercase tracking-wider text-xs font-normal"
                                                :class="{'text-gray-900 font-medium': route().current('blog.index')}"
                                            >
                                                Journal
                                            </Button>
                                            <Button
                                                @click="router.visit(route('about'))"
                                                variant="ghost"
                                                class="justify-start uppercase tracking-wider text-xs font-normal"
                                                :class="{'text-gray-900 font-medium': route().current('about')}"
                                            >
                                                About
                                            </Button>
                                            <Button
                                                @click="router.visit(route('contact'))"
                                                variant="ghost"
                                                class="justify-start uppercase tracking-wider text-xs font-normal"
                                                :class="{'text-gray-900 font-medium': route().current('contact')}"
                                            >
                                                Contact
                                            </Button>

                                            <Separator class="bg-gray-200" />

                                            <Button
                                                v-if="authUser"
                                                @click="router.visit(route('admin.dashboard'))"
                                                variant="outline"
                                                class="justify-start uppercase tracking-wider text-xs font-normal border-gray-300"
                                            >
                                                Admin
                                            </Button>
                                            <Button
                                                v-else
                                                @click="router.visit(route('login'))"
                                                variant="default"
                                                class="justify-start uppercase tracking-wider text-xs font-normal bg-gray-900"
                                            >
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
            <!-- Refined header accent - minimal and elegant -->
            <div class="h-px bg-gray-200"></div>
        </header>

        <main class="flex-1">
            <slot />
        </main>

        <!-- Footer with refined styling -->
        <footer class="bg-white mt-auto relative">
            <div class="container mx-auto px-4">
                <div class="py-12 relative">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                        <!-- Brand section -->
                        <div>
                            <div class="text-xl font-light text-gray-900 tracking-wider uppercase mb-4">
                                <span class="font-normal">TB</span> Studio
                            </div>
                            <div class="h-px w-12 bg-gray-400 mb-4"></div>
                            <p class="text-gray-600 text-sm">
                                Fashion design exploring material contrasts, asymmetric forms, and sophisticated textile manipulation.
                            </p>
                        </div>

                        <!-- Quick links -->
                        <div>
                            <h3 class="text-sm font-medium uppercase tracking-wider text-gray-900 mb-4">Explore</h3>
                            <div class="space-y-2">
                                <div><a href="#" class="text-gray-600 hover:text-gray-900 text-sm">Collections</a></div>
                                <div><a href="#" class="text-gray-600 hover:text-gray-900 text-sm">Journal</a></div>
                                <div><a href="#" class="text-gray-600 hover:text-gray-900 text-sm">About</a></div>
                                <div><a href="#" class="text-gray-600 hover:text-gray-900 text-sm">Contact</a></div>
                            </div>
                        </div>

                        <!-- Contact info -->
                        <div>
                            <h3 class="text-sm font-medium uppercase tracking-wider text-gray-900 mb-4">Contact</h3>
                            <div class="space-y-2 text-sm text-gray-600">
                                <div>studio@tatjanablecker.com</div>
                                <div>London, United Kingdom</div>
                            </div>
                        </div>
                    </div>

                    <Separator class="bg-gray-100 mb-8" />

                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <p class="text-gray-500 text-xs mb-4 md:mb-0">
                            © {{ year }} Tatjana Blecker Studio. All rights reserved.
                        </p>
                        <div class="flex space-x-6">
                            <a href="#" class="text-gray-400 hover:text-gray-900">
                                <Instagram class="h-4 w-4" />
                            </a>
                            <a href="#" class="text-gray-400 hover:text-gray-900">
                                <Twitter class="h-4 w-4" />
                            </a>
                            <a href="#" class="text-gray-400 hover:text-gray-900">
                                <Linkedin class="h-4 w-4" />
                            </a>
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
    Instagram,
    Twitter,
    Linkedin
} from 'lucide-vue-next';

import { Button } from '@/components/ui/button';
import { Separator } from '@/components/ui/separator';
import {
    Sheet,
    SheetContent,
    SheetHeader,
    SheetTitle,
    SheetTrigger,
} from '@/components/ui/sheet';

const $page = usePage();
const authUser = computed(() => $page.props.auth?.user);
const year = new Date().getFullYear();
</script>

<style scoped>
/* Refined transitions */
a, button {
    transition: all 0.3s ease;
}
</style>
