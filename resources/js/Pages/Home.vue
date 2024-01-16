<script setup>
import AppLayout from '@/Layout/AppLayout.vue';
// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from 'swiper/vue';
// Import Swiper styles
import 'swiper/css';
import { Link } from '@inertiajs/vue3';

</script>

<template>
    <AppLayout title="Inicio">
        <div class="containerx mx-auto">
            <div class="block_column">
                <h1 class="font-bold text-3xl text-slate-100 mt-11 mb-11">Destaques desta Temporada</h1>
                    <swiper :slides-per-view="6" :space-between="20" @swiper="onSwiper" @slideChange="onSlideChange">

                        <swiper-slide v-for="serie in series" :key="serie.id"
                            class="group flex items-start relative mb-auto select-none w-full h-full aspect-[5/7]">
                            <img :src="`/storage/series/${serie.metadata.posters.cover}`" :alt=" serie.metadata.name"
                                class="rounded shadow-md w-full h-full">

                            <Link class=" relative" :href="`/series/${serie.slug}`">
                            <h1 class="text-slate-100 text-lg line-clamp-2 mt-4">{{ serie.metadata.name }}</h1>
                            <span class=" rounded-md text-slate-400 font-normal text-xs">{{serie.metadata.episodes}} Epísodios</span>
                            </Link>
                        </swiper-slide>

                    </swiper>

            </div>
        </div>
    </AppLayout>
</template>


<script>

export default {

    props: {
        series: Object
    },
    components: {
        Swiper,
        SwiperSlide,
    },
    setup() {
        const onSwiper = (swiper) => {
            console.log(swiper);
        };
        const onSlideChange = () => {
            console.log('slide change');
        };
        return {
            onSwiper,
            onSlideChange,
        };
    },
}
</script>
