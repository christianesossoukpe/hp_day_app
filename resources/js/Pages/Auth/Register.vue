<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const form = useForm({
    username: "",
    email: "",
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />
        <div>
            <h2
                class="text-2xl font-semibold text-center text-gray-800 dark:text-gray-200 mb-6"
            >
                Créer un compte
            </h2>
            <form
                @submit.prevent="submit"
                class="w-full max-w-md p-6 bg-white dark:bg-gray-900 bg-opacity-80 rounded-lg shadow-lg"
            >
                <div>
                    <InputLabel for="username" value="Pseudo" />
                    <TextInput
                        id="username"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.username"
                        required
                        autofocus
                        autocomplete="username"
                    />
                    <InputError class="mt-2" :message="form.errors.username" />
                </div>

                <div class="mt-4">
                    <InputLabel for="email" value="Email" />
                    <TextInput
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        required
                        autocomplete="email"
                    />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4 flex items-center justify-end">
                    <Link
                        :href="route('login')"
                        class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    >
                        Déjà inscrit ?
                    </Link>

                    <PrimaryButton
                        class="ms-4"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        S'inscrire
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </GuestLayout>
</template>
