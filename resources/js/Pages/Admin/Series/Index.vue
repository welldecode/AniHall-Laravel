<script setup>

import AdminLayout from '@/Layout/AdminLayout.vue';
import Breadcrumbs from '@/Components/Admin/Breadcrumb.vue'
import { Link } from '@inertiajs/vue3';

import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net';
import 'datatables.net-select';
import 'datatables.net-responsive';

DataTable.use(DataTablesCore);

const options = {
    paging: false,
    searching: true,
    "language": {
        "search": "Pesquisa:",
        "loadingRecords": "Carregando...",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Items",
        "infoEmpty": "Mostrando 0 a 0 de 0 Items",
    }
}
</script>

<template>
    <AdminLayout title="Series">
        <div class="pt-14 pl-80 pr-14">
            <Breadcrumbs :href="'admin'" :title="'Painel'" :property="'Series'" />
            <div class="flex items-center gap-4">
                <Link :href="route('dashboard.serie.edit')">
                <div
                    class="mb-12 p-2 px-4 text-sm font-semibold shadow-md hover:bg-blue-700 transition-all  inline-flex bg-blue-600 rounded-md text-slate-100">
                    Adicionar Serie</div>
                </Link>
                <Link :href="route('dashboard.serie.edit')">
                <div
                    class="mb-12 p-2 px-4 text-sm font-semibold shadow-md hover:bg-blue-700 transition-all  inline-flex bg-blue-600 rounded-md text-slate-100">
                    Importar Serie</div>
                </Link>
            </div>
            <DataTable :options="options"
                class="mt-12 min-w-full divide-y divide-gray-200 shadow-sm rounded-lg display relative">
                <thead class="bg-gray-50  rounded-lg">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-center text-blue-900 uppercase">
                            ID
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-center text-blue-900 uppercase">
                            Nome
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-center text-blue-900 uppercase">
                            Slug
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 ">
                    <tr v-for="serie in series" :key="serie.id">

                        <td class="pt-5  whitespace-nowrap">
                            <div class="text-sm px-5 text-blue-900">
                                {{ serie.id }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">

                            <div class="text-sm font-medium text-blue-900">
                                <Link class="transition hover:text-blue-500" :href="`/series/${serie.slug}`">{{
                                    serie.name
                                }}</Link>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">

                            <div class="text-sm font-medium text-blue-900  whitespace-nowrap">
                                {{
                                    serie.slug
                                }}
                            </div>
                        </td>

                        <td class="relative  bottom-1 pt-2 right-15">
                            <Link :href="`series/add-or-update/${serie.id}/`"
                                class="float-left px-4 py-2 text-green-400 duration-100 rounded hover:text-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg></Link>

                            <a href="#" @click="deleteRole(serie)"
                                class="float-left px-4 py-2 ml-2 text-red-400 duration-100 rounded hover:text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </DataTable>

        </div>
    </AdminLayout>
</template>
<style>
@import 'datatables.net-bs5';
</style>
<script>
export default {
    props: {
        series: Object
    },
    data() {
        return {
            selectedUsers: [],
            term: this.$page.term || '',
        }
    },
    methods: {
        confirmAction(message, callback) {
            if (confirm(message)) {
                callback();
            }
        },
        deleteUser: function (user) {
            this.confirmAction('Are you sure you want to delete user?', function () {
                this.$inertia.delete(route('users.destroy', user.id));
            }.bind(this));
        },
        search() {
            this.$inertia.replace(this.route('users.index', { term: this.term }))
        },
        async deleteSelectedUsers() {
            if (this.selectedUsers.length === 0) {
                return;
            }

            const confirmed = confirm(`Are you sure you want to delete ${this.selectedUsers.length} user(s)?`);
            if (!confirmed) {
                return;
            }

            try {
                await this.$inertia.post('/users/delete', { ids: this.selectedUsers });
                this.selectedUsers = [];
            } catch (error) {
                console.error(error);
                alert('An error occurred while deleting the selected users.');
            }
        },
    }
}

</script>
