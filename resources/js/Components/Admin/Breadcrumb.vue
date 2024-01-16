<script setup>
import { Link } from '@inertiajs/vue3';

import { RiArrowDropRightLine} from "@remixicon/vue";


</script>

<template>
    <h2 class="font-semibold text-base text-slate-400 leading-tight mb-11 flex items-center">
        <Link class="hover:text-blue-500 duration-200" :href="`/${href}`">{{ title }}</Link>
        <RiArrowDropRightLine/>
        <Link :href="`/${href}/${property.id}`" class="text-blue-500">
        {{ property }}
        </Link>
    </h2>
</template>

<script>

export default {
    props: {
        property: String,
        title: String,
        href: String
    }
}
</script>
