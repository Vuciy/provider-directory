<template>
    <div class="flex-1" data-cy="provider-list">
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <ProviderCard
                v-for="provider in providers?.data"
                :key="provider.id"
                :provider="provider"
            />
            <div
                v-if="!providers?.data?.length"
                class="text-center text-gray-500 col-span-full"
            >
                No providers found for this category.
            </div>
        </div>
        <pagination :links="providers.links" class="mt-8" />
    </div>
</template>

<script>
import ProviderCard from "./ProviderCard.vue";
import Pagination from "./Pagination.vue";

export default {
    components: { ProviderCard, Pagination },
    props: {
        providers: { type: Object, required: true },
    },
};
</script>
