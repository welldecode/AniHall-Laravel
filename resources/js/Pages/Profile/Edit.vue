<script setup>
import AppLayout from '@/Layout/AppLayout.vue';
import SectionBorder from '@/Components/Site/SectionBorder.vue';
import DeleteUserForm from '@/Pages/Profile/Partials/DeleteUserForm.vue';
import UpdateProfileInformationForm from '@/Pages/Profile/Partials/UpdateProfileInformationForm.vue';

import UpdatePasswordForm from '@/Pages/Profile/Partials/UpdatePasswordForm.vue';

defineProps({
    confirmsTwoFactorAuthentication: Boolean,
    sessions: Array,
});
</script>

<template>
    <AppLayout title="Profile">

        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div v-if="$page.props.jetstream.canUpdateProfileInformation">
                <UpdateProfileInformationForm :user="$page.props.auth.user" />

                <SectionBorder />
            </div>
            <div v-if="$page.props.jetstream.canUpdatePassword">
                    <UpdatePasswordForm class="mt-10 sm:mt-0" />

                    <SectionBorder />
                </div>

            <template v-if="$page.props.jetstream.hasAccountDeletionFeatures">
                <SectionBorder />

                <DeleteUserForm class="mt-10 sm:mt-0" />
            </template>
        </div>
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
