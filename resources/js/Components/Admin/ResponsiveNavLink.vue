<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    active: Boolean,
    href: String,
    as: String,
});

const classes = computed(() => {
    return props.active
        ? 'block w-full pl-3 pr-4 py-2 text-left text-sm font-medium text-zinc-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out'
        : 'block w-full flex items-center gap-2 pl-3 pr-4 py-2 rounded-sm text-left text-sm font-medium text-zinc-700 hover:text-gray-200 hover:bg-[#5f75f3]  focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out';
});
</script>

<template>
    <div>
        <button v-if="as == 'button'" :class="classes" class="w-full text-left">
            <slot />
        </button>

        <Link v-else :href="href" :class="classes">
        <slot />
        </Link>
    </div>
</template>
