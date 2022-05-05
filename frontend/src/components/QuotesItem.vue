<template>
   <div class="grid grid-cols-6 gap-6">
      <div class="col-span-1 ...">
         <img src="/img/default.svg" class="inline w-10 h-10 mt-3" />
      </div>
      <div class="col-span-4 ...">
         <p class="font-sans text-sm text-slate-800 font-semibold mb-2 mt-3">{{ quote.first_name }} {{ quote.last_name }}</p>
         <div  class="grid grid-cols-2 gap-2">
            <p class="font-sans text-sm text-slate-400 mb-2">Consulta Online </p>
            <p class="font-sans text-sm text-slate-400 mb-2">10:00 / 11:00 </p>
         </div>
      </div>
      <div class="col-span-1 ...">
         <PlusIcon class="w-5 h-5 mr-2 mt-7 ml-4 text-indigo-300" />
      </div>
   </div>
</template>

<script setup>
import TButton from "./core/TButton.vue";
import { PlusIcon } from "@heroicons/vue/outline"

const { quote } = defineProps({
  quote: Object,
});

</script>

