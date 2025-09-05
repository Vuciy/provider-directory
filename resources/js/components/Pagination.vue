<template>
    <div v-if="links.length > 3" class="mt-8" data-cy="pagination">
        <div class="flex flex-wrap justify-center gap-2">
            <template v-for="(link, index) in links" :key="index">
                <div
                    v-if="link.url === null"
                    class="px-4 py-2 text-sm text-gray-400 bg-gray-100 border border-gray-200 rounded-lg cursor-not-allowed"
                    v-html="link.label"
                ></div>
                <Link
                    v-else
                    :href="link.url"
                    class="px-4 py-2 text-sm font-medium border border-gray-200 rounded-lg hover:bg-primary hover:text-white focus:bg-primary focus:text-white transition-colors duration-200"
                    :class="{ 'bg-primary text-white': link.active }"
                    v-html="link.label"
                    preserve-scroll
                ></Link>
            </template>
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
    components: { Link },
    props: {
        links: {
            type: Array,
            required: true,
        },
    },
};
</script>
