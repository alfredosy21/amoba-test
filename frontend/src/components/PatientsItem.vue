<template>
  <div class="grid grid-cols-6 gap-6">
    <div class="col-span-1 ...">
        <img src="/img/default.svg" class="inline w-10 h-10" />
    </div>
    <div class="col-span-2 ..."> <p class="font-sans text-xs text-slate-400 mb-3 mt-3">{{ patient.first_name }} {{ patient.last_name }}</p></div>
    <div class="col-span-1 ..."> <p class="font-sans text-xs text-slate-400 mb-3 mt-3">{{ patient.document }}</p></div>
    <div class="col-span-2 ...">
      <div class="flex">
        <TButton
        color="transparent"
            class="h-10 px-3 font-semibold rounded-md border border-indigo-200 text-indigo-200 mr-3"
        @click="emit('delete', survey)" >
          Borrar
        </TButton>
        <TButton 
        color="transparent"
              class="h-10 px-3 font-semibold rounded-md border border-indigo-200 bg-indigo-200 text-indigo-white"
        
        :to="{ name: 'PersonView', params: { id: patient.id } }">
          Editar
        </TButton>
      </div>
    </div>
  </div>
</template>

<script setup>
import TButton from "./core/TButton.vue";

const { patient } = defineProps({
  patient: Object,
});
const emit = defineEmits(["delete", "edit"]);
</script>

