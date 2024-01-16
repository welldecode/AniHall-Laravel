
<script setup>
import GuestLayout from '@/Layout/AuthLayout.vue'
import { Head, Link, useForm } from '@inertiajs/vue3'
import ApplicationLogo from '@/Components/Site/ApplicationLogo.vue';
import Checkbox from '@/Components/Site/Checkbox.vue';
import InputError from '@/Components/Site/InputError.vue';
import InputLabel from '@/Components/Site/InputLabel.vue';
import PrimaryButton from '@/Components/Site/PrimaryButton.vue';
import TextInput from '@/Components/Site/TextInput.vue';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
})

const form = useForm({
    email: '',
    password: '',
    remember: false,
})

const submit = () => {
    form.post('/login', {
        onFinish: () => form.reset('password'),
    })
}
</script>


<template>
    <Head title="Log in" />
    <GuestLayout>
        <div class="container mx-auto">
            <div class="min-h-screen flex  sm:justify-evenly items-center pt-6 sm:pt-0 ">
                <div class="flex items-center flex-col gap-3">
                    <ApplicationLogo class="w-80" />
                    <span class="text-slate-300 text-center">Venha fazer seu login no AniHallBrasil.</span>
                </div>

                <div class="w-full sm:max-w-md mt-6 py-12 px-10 bg-zinc-800 shadow-md overflow-hidden sm:rounded-lg">

                    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                        {{ status }}
                    </div>
                    <form @submit.prevent="submit">
                        <div>
                            <InputLabel for="email" value="E-mail" />
                            <TextInput id="email" v-model="form.email" type="email" class="mt-1 block w-full" required
                                autofocus autocomplete="username" />
                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>


                        <div class="mt-4 mb-3">
                            <InputLabel for="password" value="Senha" />
                            <TextInput id="password" v-model="form.password" type="password" class="mt-1 block w-full"
                                required autocomplete="current-password" />

                            <InputError class="mt-2" :message="form.errors.password" />
                        </div>
                        <Link :href="route('password.request')" class="text-emerald-700 text-sm pt-5">Esqueci minha senha!</Link>

                        <div class="block mt-4">
                            <label class="flex items-center">
                                <Checkbox v-model:checked="form.remember" name="remember" />
                                <span class="ml-2 text-sm text-slate-200">Lembrar de mim</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-between mt-4">
                            <div class="text-sm py-5 text-slate-200"> Não tem conta?
                                <Link :href="route('register')" class="text-emerald-500">Cadastre-se!</Link>
                            </div>
                            <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing">
                                Fazer Login
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
