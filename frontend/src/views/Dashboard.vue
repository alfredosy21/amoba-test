
<template>
  <PageComponent>
    <div class="grid grid-cols-2 gap-2">
      <div>
        <div class="mt-1 pl-10">
          <div class="panel-table grid grid-cols-1 ml-10 mr-5">
            <div class="grid grid-cols-3 gap-4 mb-3">
              <button
                class="
                  px-3
                  py-2
                  font-semibold
                  text-sm
                  bg-blue-500
                  text-white
                  rounded-full
                  shadow-sm
                "
              >
                Citas
              </button>
              <button
                class="
                  px-3
                  py-2
                  font-semibold
                  text-sm
                  bg-gray-100
                  text-blue-500
                  rounded-full
                  shadow-sm
                "
              >
                Consultas
              </button>
            </div>
            <div v-if="person.loading" class="flex justify-center">
              <p class="font-sans text-sm text-slate-400 mb-3">Cargando...</p>
            </div>
            <div v-else-if="person.quotes.length">
              <QuotesItem
                v-for="quote in person.quotes"
                :key="quote.id"
                :quote="quote"
                class="
                  opacity-1
                  animate-fade-in-down
                  mb-2
                  px-3
                  rounded-md
                  border border-indigo-100
                  bg-indigo-100
                "
              />
            </div>
            <div v-else class="text-gray-600 text-center py-16">
              <p class="font-sans text-sm text-slate-400 mb-3">
                No hay resultados disponibles
              </p>
            </div>
          </div>
        </div>
      </div>
      <div>
        <div class="flex justify-between items-left">
          <TButton
            color="transparent"
            class="font-sans text-gray-800 font-medium"
            :to="{ name: 'PersonCreate' }"
          >
            <UserIcon class="w-5 h-5 mr-2 text-slate-400" />
            Nuevo paciente
          </TButton>
          <TButton
            color="transparent"
            class="font-sans text-blue-600 font-medium"
          >
            <ClipboardListIcon class="w-5 h-5 mr-2 text-blue-600" />
            Historias clinícas
          </TButton>
          <TButton
            color="transparent"
            class="font-sans text-gray-800 font-medium"
          >
            <CalendarIcon class="w-5 h-5 mr-2 text-slate-400" />
            Agenda
          </TButton>
        </div>
        <div class="mt-5">
          <div class="panel-table grid grid-cols-1">
            <div class="grid grid-cols-3 gap-4">
              <div class="col-span-2 ...">
                <input
                  id="search"
                  name="search"
                  type="text"
                  required=""
                  v-model="search"
                  class="
                    appearance-none
                    mt-3
                    mb-3
                    relative
                    block
                    w-full
                    px-3
                    py-2
                    rounded-md
                    border-2 border-slate-200
                    placeholder-slate-400
                    text-slate-400
                    focus:outline-none
                    focus:ring-slate-200
                    focus:border-slate-200
                    focus:z-10
                    sm:text-sm
                  "
                  placeholder="Buscar por nombre y apellido"
                />
              </div>
              <div class="... text-right pt-4">
                <TemplateIcon class="w-8 h-8 inline text-indigo-200" />
                <ViewListIcon class="w-8 h-8 inline mr-2 text-blue-200" />
              </div>
            </div>
            <div v-if="person.loading" class="flex justify-center">
              <p class="font-sans text-sm text-slate-400 mb-3">Cargando...</p>
            </div>
            <div v-else-if="person.patients.length">
              <PatientsItem
                v-for="patient in patients"
                :key="patient.id"
                :patient="patient"
                class="
                  opacity-1
                  animate-fade-in-down
                  mb-2
                  pb-2
                  border-b border-slate-200
                "
                @delete="deletePatient(patient)"
              />
            </div>
            <div v-else class="text-gray-600 text-center py-16">
              <p class="font-sans text-sm text-slate-400 mb-3">
                No hay resultados disponibles
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </PageComponent>
</template>

<script setup>
import store from "../store";
import { ref, computed } from "vue";
import { ViewListIcon } from "@heroicons/vue/solid";
import {
  UserIcon,
  TemplateIcon,
  ClipboardListIcon,
  CalendarIcon,
} from "@heroicons/vue/outline";
import TButton from "../components/core/TButton.vue";
import PageComponent from "../components/PageComponent.vue";
import PatientsItem from "../components/PatientsItem.vue";
import QuotesItem from "../components/QuotesItem.vue";

const person = computed(() => store.state.person);

const search = ref("");

const patients = computed(() => {
  return store.state.person.patients.filter((patient) => {
    return (
      patient.first_name.toLowerCase().includes(search.value.toLowerCase()) ||
      patient.last_name.toLowerCase().includes(search.value.toLowerCase())
    );
  });
});

store.dispatch("getPersons");

function deletePatient(person) {
  if (confirm(`¿Desea eliminar este registro?`)) {
    store.dispatch("deletePatient", person.id).then(() => {
      store.dispatch("getPersons");
    });
  }
}
</script>
