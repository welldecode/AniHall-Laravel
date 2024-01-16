<script setup>
import { Link } from '@inertiajs/vue3';

</script>

<template>
    <h2 class="font-semibold text-sm text-slate-200 leading-tight">
        <Link class="hover:text-emerald-500 duration-200" :href="`/${href}`">{{ title }}</Link>
        /
        <Link :href="`/${href}/${property.id}`" class="text-slate-500">
            {{ property.name }}
        </Link>
    </h2>
</template>

<script>

export default {
    props: {
        property: Object,
        title: String,
        href: String
    }
}
</script>
