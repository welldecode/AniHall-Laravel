<script setup>
import AppLayout from '@/Layout/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import ResponsiveNavLink from '@/Components/Site/ResponsiveNavLink.vue';
import Dropdown from '@/Components/Site/Dropdown.vue';
import DropdownLink from '@/Components/Site/DropdownLink.vue';
</script>

<template>
    <AppLayout :title="`Assista ${serie.name} Online!`">
        <div class="relative w-full inline-block ">
            <div class="containerx  mt-12">
                <div class="absolute left-0 right-0 top-0 bottom-0 overflow-hidden  z-10 ">
                    <div :style="`background: radial-gradient(circle, rgba(41,43,54,0) 0%, rgba(41,43,54,1) 100%), url('/storage/series/banners/${serie.posters.banner}') center `"
                        class="blur-sm bg-cover bg-center absolute left-0 right-0 top-0 bottom-0 opacity-70 z-10 ">
                    </div>
                </div>
                <div class="relative  mb-7 z-10 flex justify-between w-full ">
                    <div class="w-[55em] flex justify-between flex-col mt-4">
                        <div class="flex flex-col gap-3">
                            <div class="text-slate-200 italic font-light text-base mt-6  ">{{ serie.tagline }}</div>

                            <h1 class="text-5xl text-slate-50 font-bold">{{ serie.name }}</h1>
                            <h2 class="text-sm text-slate-100 font-normal tracking-widest">{{ serie.original_name }}</h2>


                        </div>
                        <div class="mt-4">
                            <ul class="flex items-center gap-4">
                                <li class="bg-green-400 rounded-md px-3 py-1 text-xs font-semibold text-gray-700 shadow-md">
                                    Ação</li>
                                <li class="bg-green-400 rounded-md px-3 py-1 text-xs font-semibold text-gray-700 shadow-md">
                                    Shounen</li>
                                <li class="bg-green-400 rounded-md px-3 py-1 text-xs font-semibold text-gray-700 shadow-md">
                                    Anime</li>
                            </ul>
                        </div> 
                    </div>
                    <div class="w-[220px] h-[325px] absolute right-0 ">
                        <img :src="`/storage/series/${serie.posters.cover}`"
                            class="absolute w-full h-full object-cover   top-0 right-0 left-0 bottom-0 rounded-lg shadow-xl">
                    </div>
                </div>
            </div>


        </div>
        <div class="containerx mt-12 flex flex-col gap-10">
            <div class="btns flex items-center gap-5">
                <Link class="inline-flex bg-blue-500 rounded-md font-semibold text-slate-100 px-10 py-4 text-sm">
                Assistir
                Agora!</Link>

                <Link class="inline-flex bg-red-500 rounded-md font-semibold text-slate-100 px-6 py-4 text-sm">
                Adicionar à
                biblioteca!</Link>

                <Dropdown>

                    <template #trigger>
                        <span class="inline-flex rounded-md">
                            <button type="button"
                                class="flex  justify-between  w-full  bg-gray-700 rounded-md text-slate-100 px-10 py-4 text-sm">
                                <div class="flex flex-col items-start gap-1">
                                    <div class="font-semibold"> Status da Serie</div>
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
                                Status da Serie
                            </span>
                            <DropdownLink :href="route('home.index')">
                                <RiHistoryLine size="24px" color="#ccc" />
                                Assistindo
                            </DropdownLink>
                            <DropdownLink :href="route('home.index')">
                                <RiHistoryLine size="24px" color="#ccc" />
                                Pausado
                            </DropdownLink>
                            <DropdownLink :href="route('home.index')">
                                <RiHistoryLine size="24px" color="#ccc" />
                                Completo
                            </DropdownLink>
                            <DropdownLink :href="route('home.index')">
                                <RiHistoryLine size="24px" color="#ccc" />
                                Dropado
                            </DropdownLink>
                        </div>
                    </template>
                </Dropdown>
            </div>
           <div class=""> <h2 class="text-base font-semibold text-slate-100">SINOPSE:</h2>
            <span class="text-slate-50 font-normal text-base">{{ serie.description }}</span></div>
        </div>
    </AppLayout>
</template>


<script>

export default {

    props: {
        serie: Object
    }
}
</script>
