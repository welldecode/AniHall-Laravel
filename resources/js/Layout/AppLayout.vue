<script setup>
import { Head, Link, router } from '@inertiajs/vue3';

import Logo from '@/Components/Site/ApplicationLogo.vue';
import NavLink from '@/Components/Site/NavLink.vue';
import ResponsiveNavLink from '@/Components/Site/ResponsiveNavLink.vue';
import Dropdown from '@/Components/Site/Dropdown.vue';
import DropdownLink from '@/Components/Site/DropdownLink.vue';
import Toggler from '@/Components/Site/SidebarToggler.vue'
import SearchInput from '@/Components/Site/SearchInput.vue';

import { RiLogoutBoxLine, RiSettings6Line, RiUser3Line, RiHistoryLine, RiNotification3Line } from "@remixicon/vue";

defineProps({
    title: String,
});

const logout = () => {
    router.post('logout');
};
</script>



<template >
    <Head :title="title" />

    <header class="relative top-0 left-0 right-0 antialiased hover:subpixel-antialiased bg-[#1e2029]   w-full ">
        <div class="containerx mx-auto h-16 flex justify-between items-center ">
            <div class="flex items-center gap-12">
                {{ users.name }}
                <Link :href="route('home.index')">
                <Logo class="h-10" />
                </Link>
                <Toggler>
                </Toggler>
            </div>
            <div class="right flex items-center gap-14">

                <NavLink :href="route('home.index')">
                    <div
                        class="relative groups_b   flex flex-col text-slate-200 transition duration-150 px-4 py-1 ease-in-out border border-transparent rounded-md hover:text-slate-300 focus:outline-none hover:hover:bg-[#3f3f4b] active:hover:bg-[#3f3f4b]">
                        <small class="text-xs absolute right-5 top-2 text-orange-400 font-bold">BETA</small>
                        <h3 class="text-base font-semibold"> Criar Sala</h3>
                        <span class="text-xs font-light">Assista com seus amigos</span>
                    </div>
                </NavLink>
                <div class="search relative">
                    <SearchInput />
                </div>
                <Dropdown>

                    <template #trigger>
                        <span class="inline-flex rounded-md">
                            <button type="button"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-slate-100 transition duration-150 ease-in-out border border-transparent rounded-md hover:text-slate-300 focus:outline-none focus:hover:bg-[#3f3f4b] active:hover:bg-[#3f3f4b]">
                                <div class="flex flex-col items-start gap-1">
                                    <div class="font-light"> Olá, {{ $page.props.auth.user.name }}</div>
                                    <span class="font-bold">Minha Conta e Listas</span>
                                </div>
                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                </svg>
                            </button>
                        </span>
                    </template>

                    <template #content>
                        <!-- Settings Dropdown -->
                        <div class="relative p-3">

                            <span class="block pb-2 p-2 text-xs text-gray-300">
                                Funções Globais
                            </span>

                            <DropdownLink :href="route('home.index')">
                                <RiHistoryLine size="24px" color="#ccc" />
                                Histórico
                            </DropdownLink>
                            <DropdownLink :href="route('home.index')">
                                <RiNotification3Line size="24px" color="#ccc" />
                                Notificações
                            </DropdownLink>

                            <div class="border-b-2 border-zinc-700 mt-5  mb-5 border-solid w-full" />

                            <span class="block pb-2 p-2 text-xs text-gray-300">
                                Configurações Gerais
                            </span>

                            <DropdownLink :href="route('profile.index')">
                                <RiUser3Line size="24px" color="#ccc" />
                                Minha Conta
                            </DropdownLink>
                            <DropdownLink :href="route('profile.edit')" class="flex items-center gap-3">
                                <RiSettings6Line size="24px" color="#ccc" />
                                Configurações
                            </DropdownLink>

                            <div class="border-b-2 border-zinc-700 mt-5  mb-5 border-solid w-full" />

                            <form method="POST" @submit.prevent="logout">
                                <ResponsiveNavLink as="button" class="flex items-center gap-2">
                                    <RiLogoutBoxLine size="24px" color="#ccc" />
                                    Sair da Conta
                                </ResponsiveNavLink>
                            </form>
                        </div>
                    </template>
                </Dropdown>
            </div>

        </div>
    </header>
    <main class="antialiased hover:subpixel-antialiased">
        <slot />
    </main>
</template>

<script>
export default {
    data() {
        return {
            users: [],
        }
    },
    async fetch() {
        console.log('what we have received', usersResult)
        this.users = usersResult
    },
}
</script>

<style>
.bgs {
    background-color: #292b36;
}
</style>
