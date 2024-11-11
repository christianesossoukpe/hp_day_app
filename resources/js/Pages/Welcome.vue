<script setup>
import { ref, onMounted } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import lottie from 'lottie-web';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

const lottieAnimation1 = ref(null);
const lottieAnimation2 = ref(null);

onMounted(() => {
    lottie.loadAnimation({
        container: lottieAnimation1.value,
        renderer: 'svg',
        loop: true,
        autoplay: true,
        path: '/animations/Animation - 1731172579189.json', 
    });

    lottie.loadAnimation({
        container: lottieAnimation2.value,
        renderer: 'svg',
        loop: true,
        autoplay: true,
        path: '/animations/Animation - 1731321059018.json', 
    });
});
</script>

<template>
    <div class="relative min-h-screen flex items-center justify-center bg-[url('/animations/flat-lay-composition-birthday-elements-with-copyspace.jpg')] bg-cover bg-center">
        <!-- Conteneur pour la première animation Lottie -->
        <div ref="lottieAnimation1" class="absolute inset-0 z-0 opacity-30"></div>

        <!-- Conteneur pour la deuxième animation Lottie en arrière-plan -->
        <div ref="lottieAnimation2" class="absolute inset-0 z-0 opacity-30"></div>

        <div class="w-full max-w-lg p-6 bg-white dark:bg-gray-900 bg-opacity-80 rounded-xl shadow-xl space-y-6 z-10">
            <header class="text-center">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Bienvenue sur votre application HIGH DAY'S</h1>
                <p class="text-gray-600 dark:text-gray-400">Please log in or register to get started!</p>
            </header>

            <!-- Conteneur pour la première animation Lottie -->
            <div ref="lottieAnimation1" class="animation-container h-64 w-full flex justify-center items-center"></div>

            <nav class="flex flex-col items-center space-y-4">
                <template v-if="canLogin">
                    <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                        class="w-full text-center rounded-md bg-[#FF2D15] text-white py-2 transition hover:bg-[#e63946] focus:outline-none focus:ring-2 focus:ring-[#FF2D20] focus:ring-offset-2">
                        Dashboard
                    </Link>

                    <template v-else>
                        <Link :href="route('login')"
                            class="w-full text-center rounded-md bg-[#FF2D15] text-white py-2 transition hover:bg-[#e63946] focus:outline-none focus:ring-2 focus:ring-[#FF2D20] focus:ring-offset-2">
                            Log in
                        </Link>

                        <Link v-if="canRegister" :href="route('register')"
                            class="w-full text-center rounded-md bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white py-2 transition hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-[#FF2D20] focus:ring-offset-2">
                            Register
                        </Link>
                    </template>
                </template>
            </nav>
        </div>
    </div>
</template>

<style scoped>
.animation-container {
    width: 100%;
    height: 300px;
    margin: auto;
}
</style>