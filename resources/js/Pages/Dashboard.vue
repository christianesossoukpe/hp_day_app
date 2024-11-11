<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                        You're logged in!
                    </div>
                </div>
            </div>
            <template>
  <div>
    <h1 style="font-family: 'Charme', sans-serif;">Titre avec Charme</h1>
    <p style="font-family: 'Amour', sans-serif;">Texte avec Amour</p>
    <p style="font-family: 'Chalereux', sans-serif;">Texte avec Chalereux</p>
    <p style="font-family: 'Romantique', sans-serif;">Texte avec Romantique</p>
    <p style="font-family: 'Charmonman', sans-serif;">Texte avec Charmonman</p>
    <p style="font-family: 'Querelle d\'amoureux', sans-serif;">Texte avec Querelle d'amoureux</p>
    <p style="font-family: 'Aimé par le roi', sans-serif;">Texte avec Aimé par le roi</p>
  </div>
</template>
        </div>
    </AuthenticatedLayout>
</template>
