<script setup>
import GuestLayout from '@/Layout/AuthLayout.vue'
import { Head, Link, useForm } from '@inertiajs/vue3'
import { ref } from 'vue'
import AuthenticationCard from '@/Components/Site/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/Site/AuthenticationCardLogo.vue';
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
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
})
const showPassword = ref(false)

const submit = () => {
  form.post(route('register'), {
    onFinish: () => form.reset('password', 'password_confirmation'),
  })
}
</script>

<template>

  <GuestLayout>
    <Head title="Register" />


    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Name" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="username"
                />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>
            <div class="mt-4">
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autocomplete="email"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Senha" />
                <TextInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirmar Senha" />
                <TextInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="password_confirmation"
                />

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Criar Conta
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
  </GuestLayout>
</template>
