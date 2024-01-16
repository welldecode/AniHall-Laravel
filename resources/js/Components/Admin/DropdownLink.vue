<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({
    href: String,
    as: String,
});
</script>

<template>
    <div>
        <button v-if="as =='button'" type="submit" class="block w-full px-4 py-2 text-sm leading-5 text-gray-700 text-left hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">
            <slot />
        </button>

        <a v-else-if="as =='a'" :href="href" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">
            <slot />
        </a>

        <Link v-else :href="href" class="flex items-center gap-3 w-full px-2 py-3 text-sm font-medium leading-5 text-blue-950 hover:text-zinc-50 rounded-lg hover:bg-[#5f75f3] focus:outline-none focus:bg-[#5683fd8a] transition">
            <slot />
        </Link>
    </div>
</template>
