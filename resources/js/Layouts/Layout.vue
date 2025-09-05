<template>
    <div>
        <HeaderComponent />

        <main class="min-h-screen">
            <slot />
        </main>
    </div>
</template>

<script>
import HeaderComponent from "@/components/HeaderComponent.vue";

export default {
    components: { HeaderComponent },
};
</script>
