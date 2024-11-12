<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { ref, onMounted } from "vue";
import lottie from "lottie-web";

const lottieAnimation = ref(null);

onMounted(() => {
    lottie.loadAnimation({
        container: lottieAnimation.value,
        renderer: "svg",
        loop: true,
        autoplay: true,
        path: "/animations/Animation - 1731318312444.json",
    });
});
</script>

<template>
    <div
        class="relative flex min-h-screen flex-col items-center bg-[url('/animations/image.jfif')] bg-cover bg-center pt-6 sm:justify-center sm:pt-0"
    >
        <!-- Conteneur pour l'animation Lottie -->
        <div
            ref="lottieAnimation"
            class="absolute inset-0 z-0 opacity-50"
        ></div>

        <div
            class="mt-6 w-full overflow-hidden bg-white bg-opacity-80 px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg z-10"
        >
            

            <slot />
        </div>
    </div>
</template>

<style scoped>
</style>
