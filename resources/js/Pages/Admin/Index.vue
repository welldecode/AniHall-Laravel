<script setup>
import AppLayout from '@/Layout/AdminLayout.vue';
import Breadcrumbs from '@/Components/Admin/Breadcrumb.vue'
import { RiPagesLine,RiGlobalLine,RiToolsLine, RiBarChart2Line,RiArrowUpLine} from "@remixicon/vue";
</script>

<template>
    <AppLayout title="Painel">
        <div class="pt-14 pl-80 pr-14">
            <Breadcrumbs :href="'admin'" :title="'Painel'" :property="'Home'" />
            <main class="flex flex-col gap-24">
                <div class="card">
                    <h1 class="font-bold text-blue-950 text-3xl">Bem-Vindo, {{ $page.props.auth.user.name }}!</h1>
                    <span class="font-normal text-blue-900 text-base">Nenhuma atualização recente!</span>
                </div>

                <section>
                    <h1 class="font-bold text-blue-950 text-2xl mb-7">Estatísticas Gerais</h1>
                    <div class="flex flex-wrap basis-1/4 gap-6" >
                        <article class="basis-1/3 flex items-center justify-between w-full p-7 bg-white rounded-lg shadow-md">
                            <div class="item-left flex flex-col ">
                                <h2 class="mb-0 text-sm text-capitalize font-bold text-blue-950">Novos Posts</h2>
                                <span class="mb-0 text-xl text-capitalize font-bold text-blue-600">+ 25,000</span>
                            </div>
                            <div class="item-right p-3 bg-blue-600 rounded-md text-zinc-50">
                                <RiPagesLine />
                            </div>
                        </article>
                        <article class="basis-1/3 flex items-center justify-between w-full p-7 bg-white rounded-lg shadow-md">
                            <div class="item-left flex flex-col">
                                <h2 class="mb-0 text-sm text-capitalize font-bold text-blue-950">Usuários de hoje</h2>
                                <span class="mb-0 text-xl text-capitalize font-extrabold  text-blue-600  ">2,322</span>
                            </div>
                            <div class="item-right p-3 bg-blue-600 rounded-md text-zinc-50">
                                <RiGlobalLine />
                            </div>
                        </article>
                        <article class="basis-1/3 flex items-center justify-between w-full p-7 bg-white rounded-lg shadow-md">
                            <div class="item-left flex flex-col">
                                <h2 class="mb-0 text-sm text-capitalize font-bold text-blue-950">Erros no WebSite</h2>
                                <span class="mb-0 text-xl text-capitalize font-extrabold  text-blue-600">5</span>
                            </div>
                            <div class="item-right p-3 bg-blue-600 rounded-md text-zinc-50">
                                <RiToolsLine />
                            </div>
                        </article>
                        <article class="basis-1/3 flex items-center justify-between w-full p-7 bg-white rounded-lg shadow-md">
                            <div class="item-left flex flex-col">
                                <h2 class="mb-0 text-sm text-capitalize font-bold text-blue-950">Trafego</h2>
                                <span class="mb-0 text-xl text-capitalize font-extrabold  text-blue-600 flex items-center gap-1 ">
                                    <RiArrowUpLine class="font-extrabold"/> 22%</span>
                            </div>
                            <div class="item-right p-3 bg-blue-600 rounded-md text-zinc-50">
                                <RiBarChart2Line />
                            </div>
                        </article>
                    </div>
                </section>
            </main>
        </div>
    </AppLayout>
</template>
