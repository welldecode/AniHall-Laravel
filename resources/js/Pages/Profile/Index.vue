<script setup>
import AppLayout from '@/Layout/AppLayout.vue';
defineProps({
    confirmsTwoFactorAuthentication: Boolean,
    sessions: Array,
});
</script>

<template>
    <AppLayout title="Profile">
        <h2 class="text-xl font-semibold leading-tight text-slate-50">
            Profile
        </h2>

    </AppLayout>
</template>

<script>
export default {
    name: 'DashboardPage',
    data() {
        return {
            breadcrumbs: [
                {
                    title: 'Dashboard',
                    disabled: false,
                },
            ],
        }
    },
}
</script>
