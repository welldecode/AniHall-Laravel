<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { onMounted, onUnmounted, ref } from 'vue';

import { RiDashboard3Line, RiPagesLine, RiSettings5Line, RiUserLine, RiMessage2Line, RiImage2Line, RiMovieLine, RiClapperboardLine, RiGalleryUploadLine } from "@remixicon/vue";



import DropdownLink from '@/Components/Admin/DropdownLink.vue';
let open = ref(false);

const closeOnEscape = (e) => {
    if (open.value && e.key === 'Esc') {
        open.value = false;
    }
};

onMounted(() => document.addEventListener('keydown', closeOnEscape));
onUnmounted(() => document.removeEventListener('keydown', closeOnEscape));
</script>

<style scoped>
.op-enter-active,
.op-leave-active {
    transition: all 450ms ease-in-out;
    opacity: 1;
}

.op-enter-from,
.op-leave-to {
    opacity: 0;
}
</style>

<template>
    <div @click="open = !open">
        <aside class="fixed top-16  border-solid z-50 border-r  border-slate-200   h-screen w-64">

            <div class="py-10 px-5 text-slate-100">
                <div class="hidden user p-2 mb-10 rounded-md flex items-center flex-col bg-[#435be4]">
                    <h2 class="text-base font-bold">{{ $page.props.auth.user.name }}</h2>
                    <span class="text-sm font-light">{{ $page.props.auth.user.role }}</span>
                </div>
                <div class="as">
                    <h1 class="font-extrabold p-2 border-b-4 border-indigo-600 text-blue-950 text-xs">SITE</h1>
                </div>
                <DropdownLink :href="route('dashboard.index')">
                    <RiDashboard3Line size="22px" />
                    <div class="flex flex-col  ">
                        Painel
                    </div>
                </DropdownLink>
                <DropdownLink :href="route('dashboard.posts.show')">
                    <RiClapperboardLine size="22px" class="font-normal" />
                    <div class="flex flex-col ">
                        Posts
                    </div>
                </DropdownLink>
                <DropdownLink :href="route('dashboard.serie.show')">
                    <RiMovieLine size="22px" class="font-normal" />
                    <div class="flex flex-col ">
                        Series
                    </div>
                </DropdownLink>
                <DropdownLink :href="route('dashboard.index')">
                    <RiImage2Line size="22px" class="font-normal" />
                    <div class="flex flex-col ">
                        Mídias
                    </div>
                </DropdownLink>

                <DropdownLink :href="route('dashboard.index')">
                    <RiMessage2Line size="22px" class="font-normal" />
                    <div class="flex flex-col ">
                        Comentário
                    </div>
                </DropdownLink>
                <div class="as">
                    <h1 class="font-extrabold mt-12 p-2 border-b-4 border-indigo-600  text-blue-950 text-xs">
                        CONFIGURAÇÕES</h1>
                </div>
                <DropdownLink :href="route('dashboard.index')">
                    <RiPagesLine size="22px" />
                    <div class="flex flex-col  ">
                        Aparência
                    </div>
                </DropdownLink>
                <DropdownLink :href="route('dashboard.index')">
                    <RiUserLine size="22px" />
                    <div class="flex flex-col  ">
                        Usuarios
                    </div>
                </DropdownLink>
                <DropdownLink :href="route('dashboard.index')">
                    <RiSettings5Line size="22px" class="font-normal" />
                    <div class="flex flex-col ">
                        Ferramentas
                    </div>
                </DropdownLink>
                <DropdownLink :href="route('dashboard.importer.show')">
                    <RiGalleryUploadLine size="22px" class="font-normal" />
                    <div class="flex flex-col ">
                        Importador
                    </div>
                </DropdownLink>
            </div>
        </aside>
    </div>
</template>
