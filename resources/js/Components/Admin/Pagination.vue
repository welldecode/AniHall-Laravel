<script setup>

import { Link } from '@inertiajs/vue3';
</script>
<template>
    <div class="m-5" v-if="links.length > 3">
        <div class="flex flex-wrap -mb-1">
            <template v-for="(link, p) in links" :key="p">
                <div v-if="link.url === null" class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded"
                    v-html="link.label" />
                <Link v-else
                    class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded  focus:border-indigo-500 focus:text-indigo-500"
                     :href="link.url" v-html="link.label"></Link>
            </template>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        links: Array
    },
}
</script>
