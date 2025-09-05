<template>
    <Link :href="`/providers/${provider.id}`" data-cy="provider-card">
        <div
            class="bg-white rounded-xl shadow-lg p-6 hover:shadow-2xl transition-transform duration-300 transform hover:-translate-y-1"
        >
            <img
                :src="provider.logo"
                alt="Logo"
                loading="lazy"
                class="w-64 sm:w-48 object-contain mb-4 mx-auto"
            />
            <h2
                class="text-lg sm:text-xl font-semibold text-gray-800 text-center"
            >
                <div class="hover:text-primary transition-colors duration-200">
                    {{ provider.name }}
                </div>
            </h2>
            <p class="text-gray-600 mt-2 text-center line-clamp-2">
                {{ provider.description }}
            </p>
            <p class="text-sm text-gray-400 mt-2 text-center">
                Category: {{ provider.category?.name || "Unknown" }}
            </p>
        </div>
    </Link>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
    props: {
        provider: { type: Object, required: true },
    },
    components: { Link },
};
</script>
