
<!-- resources/js/Pages/Landing/Contact.vue -->
<template>
    <MainLayout>
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold mb-6">Contact Us</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <div class="bg-white shadow rounded-lg p-6 mb-8">
                        <h2 class="text-2xl font-bold mb-4">Get in Touch</h2>
                        <p class="text-gray-700 mb-6">
                            Have questions, suggestions, or need help with something? We'd love to hear from you!
                            Fill out the form and we'll get back to you as soon as possible.
                        </p>

                        <div class="space-y-4">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-gray-700">contact@tatjanahub.com</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                <span class="text-gray-700">+1 (555) 123-4567</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span class="text-gray-700">123 Digital Avenue, Web City, 12345</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded-lg p-6">
                        <h2 class="text-2xl font-bold mb-4">Business Hours</h2>
                        <ul class="space-y-2">
                            <li class="flex justify-between">
                                <span class="text-gray-700">Monday - Friday:</span>
                                <span class="text-gray-700 font-medium">9:00 AM - 5:00 PM</span>
                            </li>
                            <li class="flex justify-between">
                                <span class="text-gray-700">Saturday:</span>
                                <span class="text-gray-700 font-medium">10:00 AM - 2:00 PM</span>
                            </li>
                            <li class="flex justify-between">
                                <span class="text-gray-700">Sunday:</span>
                                <span class="text-gray-700 font-medium">Closed</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-2xl font-bold mb-4">Send a Message</h2>
                    <form @submit.prevent="submitForm">
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                            <input type="text" id="name" v-model="form.name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                            <input type="email" id="email" v-model="form.email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="subject" class="block text-gray-700 font-medium mb-2">Subject</label>
                            <input type="text" id="subject" v-model="form.subject" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="mb-6">
                            <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
                            <textarea id="message" v-model="form.message" rows="5" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import MainLayout from '@/layouts/MainLayout.vue';

const form = useForm({
    name: '',
    email: '',
    subject: '',
    message: '',
});

const submitForm = () => {
    // In a real implementation, you would send this to a backend route
    // For now, we'll just reset the form and show an alert
    form.post(route('contact.submit'), {
        onSuccess: () => {
            alert('Thank you for your message! We will get back to you soon.');
            form.reset();
        },
    });
};
</script>
