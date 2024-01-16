<script setup>
import { Head } from '@inertiajs/vue3';

defineProps({
    title: String,
});

</script>

<template >
    <Head :title="title" />

    <main class="antialiased hover:subpixel-antialiased">
        <slot />
    </main>
</template>

<style>
.bgs {
    background-color: #0a0a0c;
}
</style>
