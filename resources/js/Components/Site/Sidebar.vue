<script setup>

import DropdownLink from '@/Components/Site/DropdownLink.vue';
import { RiListView, RiHome3Line, RiCalendar2Fill } from "@remixicon/vue";

</script>


<template>
    <div class="absolute z-50 shadow-lg  top-5 rounded-lg  bg-[#343746]  w-96">

        <!-- Settings Dropdown -->
        <div class="relative p-5">

            <DropdownLink :href="route('home.index')">
                <RiHome3Line size="24px" color="#ccc" />
                <div class="flex flex-col text-base font-bold">
                    Home
                    <span class="text-xs e font-light">Pagina Inicial</span>
                </div>
            </DropdownLink>
            <DropdownLink :href="route('home.index')">
                <RiListView size="24px" color="#ccc" />
                <div class="flex flex-col text-base font-bold">
                    Catálogo
                    <span class="text-xs e font-light">Pagina com series e filmes</span>
                </div>
            </DropdownLink>

            <DropdownLink :href="route('home.index')">
                <RiCalendar2Fill size="24px" color="#ccc" />
                <div class="flex flex-col text-base font-bold">
                    Calendário
                    <span class="text-xs e font-light">Calendário Semanal de series</span>
                </div>
            </DropdownLink>


        </div>
    </div>
</template>
