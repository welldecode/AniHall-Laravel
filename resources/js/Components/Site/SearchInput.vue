<script setup>
import { RiSearch2Line} from "@remixicon/vue";

import { ref } from "vue";
let input = ref("");
const fruits = ["apple", "banana", "orange"];
function filteredList() {
  return fruits.filter((fruit) =>
    fruit.toLowerCase().includes(input.value.toLowerCase())
  );
}
</script>
<template>
    <div class="search relative" >
    <RiSearch2Line size="26px"  className="my-icon" class="absolute top-2 left-3 text-slate-200   " />
    <input type="text" v-model="input" placeholder="Procure por uma serie..." class="  pl-14 rounded p-3 w-80 focus:outline-none bg-[#343746] text-sm text-slate-200 border-0 placeholder-gray-200"  />

    </div>
</template>
