<script setup>

import AdminLayout from '@/Layout/AdminLayout.vue';
import Breadcrumbs from '@/Components/Admin/Breadcrumb.vue'
import { Link } from '@inertiajs/vue3';
import InputError from '@/Components/Admin/InputError.vue';
import PrimaryButton from '@/Components/Admin/PrimaryButton.vue';
import TextInput from '@/Components/Admin/TextInput.vue';
import TextArea from '@/Components/Admin/TextArea.vue';
import InputLabel from '@/Components/Admin/InputLabel.vue';
</script>

<template>
    <AdminLayout title='Edição Serie'>

        <div class="pt-14 pl-80 pr-14">
            <Breadcrumbs :href="'admin'" :title="'Painel'" :property="'Serie'" />

            <form action="">
                <div class="grid grid-cols-1 gap-20 md:grid-cols-2 mb-10">
                    <div>
                        <InputLabel for="email" value="Titulo Principal" />
                        <TextInput id="title" type="text" class="mt-1 block w-full" required autofocus
                            placeholder="Titulo da Serie" autocomplete="title" />
                        <InputError class="mt-2" />
                    </div>
                    <div>
                        <InputLabel for="text" value="Thumbnail" />
                        <div class="mt-1 block w-full">
                            <input type="file" id="avatar">
                        </div>
                    </div>
                </div>
                <div class=" ">
                    <TextArea id="title" type="text" class="  mt-10 block w-full" required autofocus
                        placeholder="Sinopse da Serie" autocomplete="title" />
                    <InputError class="mt-2" />
                </div>
                <PrimaryButton class="mt-10">
                    Salvar
                </PrimaryButton>
            </form>
        </div>
    </AdminLayout>
</template>
<script>
export default {
    props: {
        series: Object
    },
}

</script>
