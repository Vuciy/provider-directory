<template>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow-card p-6 max-w-2xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800">
                {{ provider.name }}
            </h1>
            <p class="text-secondary mt-4">{{ provider.description }}</p>
            <img
                :src="provider.logo"
                alt="Logo"
                loading="lazy"
                class="w-24 h-24 object-contain mt-4"
            />
            <p class="text-sm text-gray-500 mt-2">
                Category: {{ provider.category.name }}
            </p>
            <p class="text-xs text-gray-500">
                {{ provider.category?.description }}
            </p>
            <Link
                href="/providers"
                class="inline-block mt-6 px-6 py-2 bg-primary text-white font-medium rounded-lg hover:bg-accent transition-colors duration-200"
            >
                Back to Providers
            </Link>
        </div>
    </div>
</template>

<script>
import Layout from "@/Layouts/Layout.vue";
import { Link } from "@inertiajs/vue3";

export default {
    layout: Layout,
    components: { Link },
    props: {
        provider: {
            type: Object,
            required: true,
        },
    },
};
</script>
