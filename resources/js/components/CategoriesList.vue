<template>
    <div data-cy="Categories-list">
        <!-- Mobile Drawer Toggle -->
        <div class="sm:hidden mb-4 flex justify-end">
            <button
                @click="$emit('toggle-drawer')"
                class="px-4 py-2 bg-primary text-white font-medium rounded-lg shadow-md hover:bg-primary-dark transition-colors duration-200"
            >
                Categories
            </button>
        </div>

        <!-- Mobile Drawer -->
        <transition name="slide">
            <div
                v-if="drawerOpen && isMobile"
                class="fixed inset-0 z-50 flex bg-black bg-opacity-40"
            >
                <div class="bg-white w-64 h-full p-6 shadow-xl">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-semibold text-gray-800">
                            Categories
                        </h2>
                        <button
                            @click="$emit('close-drawer')"
                            class="text-gray-600 text-2xl font-bold"
                        >
                            ✕
                        </button>
                    </div>
                    <ul class="space-y-3">
                        <li
                            @click="$emit('select-category', '')"
                            :class="getCategoryClass('')"
                        >
                            All Categories
                        </li>
                        <li
                            v-for="cat in categories"
                            :key="cat.id"
                            @click="$emit('select-category', cat.id)"
                            :class="getCategoryClass(cat.id)"
                        >
                            {{ cat.name }}
                        </li>
                    </ul>
                </div>
                <div @click="$emit('close-drawer')" class="flex-1"></div>
            </div>
        </transition>

        <!-- Desktop Sidebar -->
        <div
            class="hidden sm:block bg-white rounded-lg shadow-lg p-6 sticky top-8"
        >
            <h2 class="text-xl font-semibold mb-4 text-gray-800">Categories</h2>
            <ul class="space-y-3">
                <li
                    @click="$emit('select-category', '')"
                    :class="getCategoryClass('')"
                >
                    All Categories
                </li>
                <li
                    v-for="cat in categories"
                    :key="cat.id"
                    @click="$emit('select-category', cat.id)"
                    :class="getCategoryClass(cat.id)"
                >
                    {{ cat.name }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        categories: { type: Array, required: true },
        activeCategory: { type: [String, Number], default: "" },
        drawerOpen: { type: Boolean, default: false },
        isMobile: { type: Boolean, default: false },
    },
    methods: {
        getCategoryClass(catId) {
            return [
                "cursor-pointer px-3 py-2 rounded-lg transition-colors duration-200",
                catId === this.activeCategory
                    ? "bg-primary text-white font-semibold"
                    : "hover:bg-primary-light hover:text-primary text-gray-700",
            ];
        },
    },
};
</script>

<style>
.slide-enter-active,
.slide-leave-active {
    transition: transform 0.3s ease, opacity 0.3s ease;
}
.slide-enter-from {
    transform: translateX(-100%);
    opacity: 0;
}
.slide-enter-to {
    transform: translateX(0);
    opacity: 1;
}
.slide-leave-from {
    transform: translateX(0);
    opacity: 1;
}
.slide-leave-to {
    transform: translateX(-100%);
    opacity: 0;
}
</style>
