<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3'
import { ref } from 'vue';
import Breadcrumbs from '@/Components/Admin/Breadcrumb.vue'
import AppLayout from '@/Layout/AdminLayout.vue';
import Modal from '@/Components/Admin/Modal.vue';
import axios from 'axios';
import { RiAddLine } from "@remixicon/vue";

import 'vue-toastification/dist/index.css'
import { useToast } from "vue-toastification";
const currentPage = ref(1);

</script>

<template>
    <AppLayout title="Painel">
        <div class="pt-14 pl-80 pr-14">
            <Breadcrumbs :href="'admin'" :title="'Painel'" :property="'Importador'" />
            <div class="mb-24 content_list  flex gap-5 items-center">
                <div class="saerch"><input type="search" v-model="searchQuery"
                        class="border-slate-100 rounded-md border-2 p-2 font-normal text-base text-blue-900 w-80"
                        placeholder="Pesquise uma serie"></div>
                <div @click="getSearch"
                    class="inline-flex p-3 px-5 bg-blue-500 cursor-pointer text-slate-50 rounded-md text-sm font-medium">
                    Pesquisar Series
                </div>
            </div>
            <div class="mt-2 mb-7">
                <div v-if="series.length > 1"></div>
                <div v-else>
                    <vue-awesome-paginate :total-items="series.total_pages" :items-per-page="5" :max-pages-shown="5"
                        :disable-breakpoint-buttons="true" v-model="currentPage" :on-click="getSeries" />
                </div>
            </div>
            <div class="flex flex-wrap basis-1/6  gap-4  ">
                <article v-for="(serie, index) in series.results" :key="serie.id"
                    class="relative p-3 flex flex-col rounded-lg  border-slate-200   basis-1/8 w-full overflow-hidden mb-6">
                    <div class="h-64">

                        <img :src="'https://image.tmdb.org/t/p/original' + serie.poster_path" :alt="serie.name"
                            class="w-full  h-full object-cover rounded-md">
                    </div>
                    <Modal>
                        <template #trigger>
                            <div data-type="tv"
                                class="absolute right-7 top-8 text-slate-50 p-1  cursor-pointer bg-green-400 rounded-md">
                                <RiAddLine />
                            </div>
                        </template>

                        <template #image>
                            <div class="w-60  h-[380px]">
                                <img :src="'https://image.tmdb.org/t/p/original' + serie.poster_path" :alt="serie.name"
                                    class="w-full  h-full object-cover rounded-md shadow-xl">
                            </div>
                        </template>

                        <template #header>
                            <div class="banner">
                                <div class="absolute -z-50 left-0 top-0  w-full  h-[130px]   ">
                                    <img :src="'https://image.tmdb.org/t/p/original' + serie.backdrop_path"
                                        :alt="serie.name"
                                        class="w-full  opacity-1 h-full object-cover rounded-md opacity-30 bg-slate-200/25">
                                </div>
                            </div>
                            <div class="flex flex-col gap-2">
                                <div class="text-lg">{{ serie.name }}</div>
                                <span class="text-xs font-normal">{{ serie.original_name }}</span>
                            </div>
                        </template>

                        <template #content>
                            <div class="font-normal text-xs">
                                {{ serie.overview }}</div>
                        </template>

                        <template #footer>
                            <div @click="addSerie(serie.id)"
                                :class="'mt-5 font-normal text-sm bg-blue-500 rounded-lg shadow-md text-slate-100 p-2 px-5  transition-all inline-flex cursor-pointer hover:bg-blue-800'">
                                Adicionar Serie</div>
                        </template>

                    </Modal>

                    <div class="data  text-left">
                        <h3 class="font-medium text-base text-left text-blue-900 pt-4">{{ serie.name }}</h3>
                        <span class="text-sm font-light text-zinc-400">
                            {{ serie.production_companies }}</span>
                    </div>
                </article>

            </div>
            <div class="mb-24">
                <div class="mt-2 mb-7" v-if="series.length > 1"></div>
                <div v-else>
                    <vue-awesome-paginate :total-items="series.total_pages" :items-per-page="5" :max-pages-shown="5"
                        :disable-breakpoint-buttons="true" v-model="currentPage" :on-click="getSeries" />
                </div>
            </div>
            <div class="" v-if="this.loading = false">Carregando</div>
        </div>
    </AppLayout>
</template>

<script>
export default {
    name: 'series',

    data() {
        return {
            searchQuery: null,
            series: [],
            loading: false,
        }
    },
    mounted() {
        this.getSeries()
    },
    methods: {
        getSeries(page = 1) {

            const params = {
                api_key: '1c5f3ddf7200ab1e47b23c2b12ed7f8b',
                page: page,
                include_adult: false,
                include_null_first_air_dates: false,
                language: 'pt-BR',
                sort_by: 'popularity.desc',
                with_keywords: 210024
            };

            axios.get('https://api.themoviedb.org/3/discover/tv/', { params }).then(res => {


                this.loading = true;
                this.series = res.data;
            })
        },

        addSerie(id = null) {

            const toast = useToast();
            const params = {
                language: 'pt-BR',
                include_image_language: 'pt-BR',
                api_key: '1c5f3ddf7200ab1e47b23c2b12ed7f8b'
            };
            axios.get('https://api.themoviedb.org/3/tv/' + id, { params }).then(res => {


                const form = useForm({
                    name: res.data.name,
                    original_name: res.data.original_name,
                    description: res.data.overview,
                    poster_path: 'https://image.tmdb.org/t/p/original' + res.data.poster_path,
                    backdrop_path: 'https://image.tmdb.org/t/p/original' + res.data.backdrop_path,
                    productions: res.data.production_companies,
                    seasons: res.data.number_of_seasons,
                    episodes: res.data.number_of_episodes,
                    tagline: res.data.tagline

                })

                form.post('/admin/importer', {
                    onSuccess: () =>
                        toast.success("Serie adicionada ao site!", {
                            position: "bottom-center",
                            timeout: 6427,
                            closeOnClick: true,
                            pauseOnFocusLoss: true,
                            pauseOnHover: true,
                            draggable: true,
                            draggablePercent: 0.6,
                            showCloseButtonOnHover: true,
                            hideProgressBar: true,
                            closeButton: false,
                            icon: false,
                        }),

                })

            })
        },

        getSearch() {
            const toast = useToast();
            const params = {
                query: this.searchQuery,
                language: 'pt-BR',
                include_image_language: 'pt-BR',
                api_key: '1c5f3ddf7200ab1e47b23c2b12ed7f8b'
            };

            if (this.searchQuery == '') {
                this.getSeries();
            } else {
                axios.get('https://api.themoviedb.org/3/search/tv', { params }).then(res => {
                    this.loading = true;
                    this.series = res.data;
                }).catch(error => {
                    toast.success(error, {
                        position: "bottom-center",
                        timeout: 6427,
                        closeOnClick: true,
                        pauseOnFocusLoss: true,
                        pauseOnHover: true,
                        draggable: true,
                        draggablePercent: 0.6,
                        showCloseButtonOnHover: true,
                        hideProgressBar: true,
                        closeButton: false,
                        icon: false,
                    })

                });

            }
        }
    },
    watch: {
        searchQuery(after, before) {
            if (this.searchQuery == '') {
                this.getSeries();
            }

        }
    },
}
</script>

<style>
.pagination-container {
    display: flex;
    column-gap: 10px;
}

.paginate-buttons {
    height: 40px;
    width: 40px;
    border-radius: 5px;
    cursor: pointer;
    background-color: rgb(255, 255, 255);
    border: 1px solid rgb(217, 217, 217);
    color: #001525;
}

.paginate-buttons:hover {
    background-color: #0087f5;
    color: #fff;
}

.active-page {
    background-color: #238ee6;
    color: #fff;
}

.active-page:hover {
    background-color: #0087f5;
}
</style>
