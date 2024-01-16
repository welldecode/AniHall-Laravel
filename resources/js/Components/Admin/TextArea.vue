<script setup>
import { onMounted, ref } from 'vue';

import Editor from '@tinymce/tinymce-vue'

defineProps({
    modelValue: String,
});

defineEmits(['update:modelValue']);
</script>

<template>
    <div class="mt-12 w-full">
    <editor
    api-key="eh0qgwn1etqn08za1m2k7qosu5rf5euv026ikaqrac2i496s"
    :init="{
    selector: 'textarea',
      menubar: false,
    }"
  /></div>
</template>
<script>

export default {
name: 'app',
components: {
  'editor': Editor
}
}
</script>
