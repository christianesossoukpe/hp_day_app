<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    username: '',
    password: '',
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>

        <Head title="Log in" />
        <h2 class="text-2xl font-semibold text-center text-gray-800 dark:text-gray-200 mb-6">Connexion</h2>
       
        <form @submit.prevent="submit"  class="w-full max-w-md p-6 bg-white dark:bg-gray-900 bg-opacity-80 rounded-lg shadow-lg">
            <div>
                <InputLabel for="username" value="Pseudo" />
                <TextInput id="username" type="text" class="mt-1 block w-full" v-model="form.username" required
                    autofocus autocomplete="username" />
                <InputError class="mt-2" :message="form.errors.username" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />
                <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required
                    autocomplete="current-password" />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4 flex items-center justify-end">
                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Se connecter
                </PrimaryButton>
            </div>
            <div v-if="form.errors.username" class="mt-2 text-red-500">
                {{ form.errors.username }}
            </div>
        </form>
    </GuestLayout>
</template>