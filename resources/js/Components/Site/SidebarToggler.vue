<script setup>
import { onMounted, onUnmounted, ref } from 'vue';

import Sidebar from '@/Components/Site/Sidebar.vue';
import { RiMenuFill, RiMenu5Line, RiCloseLine, RiArrowLeftLine } from "@remixicon/vue";


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

.op-enter-active, .op-leave-active {
  transition: all 450ms ease-in-out;
  opacity: 1;
}

.op-enter-from, .op-leave-to {
  opacity: 0;
}
</style>

<template>
    <div class="relative">
        <div @click="open = !open">
            <div class="cursor-pointer btn-close relative left-0 py-1 px-2 z-50 rounded-md text-slate-200 text-sm flex items-center gap-4  bg-[#343746] justify-between transition duration-15 hover:hover:bg-[#32323b] active:hover:bg-[#32323b]" v-show="!open" style="display: none;" >
                <RiMenuFill color="#fff" size="26px" class="cursor-pointer" />
             Navegação
          </div>
            <div v-show="open"
                class="cursor-pointer btn-close relative  left-0 py-1 px-2  z-50  rounded-md text-slate-200 text-sm flex items-center gap-4 bg-[#343746] justify-between">
                <RiCloseLine class="cursor-pointer" color="#fff" size="26px" />
                Fechar Menu
            </div>

        </div>
        <div v-show="open" class="fixed inset-0 z-[15] bg-[#000]/40" @click="open = false"></div>
        <!-- Full Screen Dropdown Overlay -->

        <transition
            enter-active-class="transition ease-out duration-200"
            enter-from-class="transform opacity-0 scale-95"
            enter-to-class="transform opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75"
            leave-from-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95"
        >
            <div v-show="open" style="display: none;" class="relative">
                <Sidebar />
            </div>
        </transition>
    </div>
</template>
