<template>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col sm:flex-row gap-6">
            <div class="w-full sm:w-64 flex-shrink-0">
                <CategoriesList
                    :categories="categories"
                    :activeCategory="category"
                    :drawerOpen="drawerOpen"
                    :isMobile="isMobile"
                    @select-category="selectCategory"
                    @toggle-drawer="drawerOpen = true"
                    @close-drawer="drawerOpen = false"
                />
            </div>

            <provider-list :providers="providers"></provider-list>
        </div>
    </div>
</template>

<script>
import Layout from "@/Layouts/Layout.vue";
import ProviderList from "../../components/ProviderList.vue";
import CategoriesList from "../../components/CategoriesList.vue";
import { router } from "@inertiajs/vue3";
import _ from "lodash";

export default {
    layout: Layout,
    components: { CategoriesList, ProviderList },
    props: {
        providers: {
            type: [Array, Object],
            required: true,
        },

        categories: {
            type: Array,
            required: true,
        },
        filters: {
            type: Object,
            default: () => ({}),
        },
    },
    data() {
        return {
            category: this.filters.category || "",
            drawerOpen: false,
            isMobile: window.innerWidth < 640,
        };
    },
    mounted() {
        window.addEventListener("resize", this.handleResize);
    },
    beforeUnmount() {
        window.removeEventListener("resize", this.handleResize);
    },
    methods: {
        handleResize() {
            this.isMobile = window.innerWidth < 640;
            if (!this.isMobile) this.drawerOpen = false;
        },
        selectCategory(catId) {
            if (this.category === catId) return;
            this.category = catId;
            this.drawerOpen = false;
            this.filterProviders();
        },

        filterProviders: _.debounce(function () {
            router.get(
                "/providers",
                { category: this.category },
                {
                    only: ["providers"],
                    preserveState: true,
                    preserveScroll: true,
                    replace: true,
                    onSuccess: (page) => {},
                }
            );
        }, 300),
    },
};
</script>
