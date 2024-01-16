<script setup>
import { computed, onMounted, onUnmounted, ref } from 'vue';

import { RiCloseLine } from "@remixicon/vue";

let open = ref(false);

const props = defineProps({

    maxWidth: {
        type: String,
        default: '2xl',
    },
});
const closeOnEscape = (e) => {
    if (open.value && e.key === 'Escape') {
        open.value = false;
    }
};
onMounted(() => document.addEventListener('keydown', closeOnEscape));
onUnmounted(() => document.removeEventListener('keydown', closeOnEscape));


const maxWidthClass = computed(() => {
    return {
        'sm': 'sm:max-w-sm',
        'md': 'sm:max-w-md',
        'lg': 'sm:max-w-lg',
        'xl': 'sm:max-w-xl',
        '2xl': 'sm:max-w-2xl',
    }[props.maxWidth];
});
</script>

<template>
    <div @click="open = !open">
        <slot name="trigger" />
    </div>

    <teleport to="body">
        <div v-show="open" class="fixed inset-0 z-50 bg-[#fff]/80" @click="open = false"></div>
        <div v-show="open" style="display: none;">
            <div class="fixed  top-0 bottom-0 right-0 left-0 flex justify-center items-center ml-auto m-auto overflow-y-auto px-4 py-6 sm:px-0 z-50"
                scroll-region>
                <div class="mb-6 bg-slate-50 p-10 rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto"
                    :class="maxWidthClass">
                    <button class="modal-default-button absolute right-5 top-5" @click="open = !open">
                        <RiCloseLine color="red" />
                    </button>
                    <div class="flex gap-10  justify-between">
                        <div class="thumb ">
                            <slot name="image" />
                        </div>
                        <div class="flex flex-col ">
                            <div class="py-4 text-2xl font-bold text-slate-950">
                                <slot name="header" />
                            </div>
                            <div class="flex flex-col justify-between h-full">
                                <div class="modal-body mt-6">
                                    <slot name="content" />
                                </div>
                                <div class="modal-footer">
                                    <slot name="footer" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </teleport>
</template>
