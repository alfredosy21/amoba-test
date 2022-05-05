<template>
  <PageComponent>
    <div class="grid grid-cols-2 gap-2">
      <div>
        <div v-if="personLoading" class="flex justify-center">Cargando...</div>
        <form v-else @submit.prevent="savePerson" class="animate-fade-in-down">
          <div class="panel-table sm:rounded-md sm:overflow-hidden">
            <!-- Person Fields -->
            <div class="px-4 py-5 space-y-6 sm:p-6">
              <h3 class="text-lg font-semibold text-slate-400">
                {{
                  route.params.id ? "Actualizar Paciente" : "Registrar Paciente"
                }}
              </h3>

              <Alert v-if="errorMsg">
                {{ errorMsg }}
                <span
                  @click="errorMsg = ''"
                  class="
                    w-8
                    h-8
                    flex
                    items-center
                    justify-center
                    rounded-full
                    transition-colors
                    cursor-pointer
                    hover:bg-[rgba(0,0,0,0.2)]
                  "
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M6 18L18 6M6 6l12 12"
                    />
                  </svg>
                </span>
              </Alert>

              <!-- First Name -->
              <div>
                <label
                  for="first_name"
                  class="block text-sm font-medium text-slate-400"
                  >Nombre</label
                >
                <input
                  type="text"
                  name="first_name"
                  id="first_name"
                  v-model="model.first_name"
                  placeholder="Ingrese el nombre"
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
                />
              </div>
              <!--/ Name -->
              <!-- Last Name -->
              <div>
                <label
                  for="last_name"
                  class="block text-sm font-medium text-slate-400"
                  >Apellido</label
                >
                <input
                  type="text"
                  name="last_name"
                  id="last_name"
                  v-model="model.last_name"
                  placeholder="Ingrese el apellido"
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
                />
              </div>
              <!--/ Last Name -->
              <!-- Document -->
              <div>
                <label
                  for="document"
                  class="block text-sm font-medium text-slate-400"
                  >Documento</label
                >
                <input
                  type="text"
                  name="document"
                  id="document"
                  v-model="model.document"
                  placeholder="Ingrese el documento"
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
                />
              </div>
              <!--/ Document -->
            </div>
            <!--/ Person Fields -->
            <div class="px-4 py-3text-right sm:px-6">
              <TButton>
                <SaveIcon class="w-5 h-5 mr-2" />
                Guardar
              </TButton>
            </div>
          </div>
        </form>
      </div>
    </div>
  </PageComponent>
</template>
<script setup>
import { v4 as uuidv4 } from "uuid";
import { computed, ref, watch } from "vue";
import { useRoute, useRouter } from "vue-router";
import { SaveIcon, TrashIcon, ExternalLinkIcon } from "@heroicons/vue/solid";
import store from "../store";
import Alert from "../components/Alert.vue";
import PageComponent from "../components/PageComponent.vue";
import TButton from "../components/core/TButton.vue";

const router = useRouter();

const route = useRoute();

// Get person loading state, which only changes when we fetch person from backend
const personLoading = computed(() => store.state.currentPerson.loading);

let errorMsg = ref("");

// Create empty person
let model = ref({
  first_name: "",
  last_name: "",
  document: "",
});

// Watch to current person data change and when this happens we update local model
watch(
  () => store.state.currentPerson.data,
  (newVal) => {
    model.value = {
      ...JSON.parse(JSON.stringify(newVal))
    };
  }
);

// If the current component is rendered on person update route we make a request to fetch person
if (route.params.id) {
  store.dispatch("getPerson", route.params.id);
}

/**
 * Create or update person
 */
function savePerson() {
  if (model.value.first_name == "") {
    errorMsg.value = "Ingrese el nombre";
    return;
  } else if (model.value.last_name == "") {
    errorMsg.value = "Ingrese el apellido";
    return;
  } else if (model.value.document == "") {
    errorMsg.value = "Ingrese el documento";
    return;
  } else {
    store.dispatch("savePerson", { ...model.value }).then(({ data }) => {
      if (data.person) {
        router.push({ name: "Dashboard" });
      } else {
        errorMsg.value = data.error.document[0];
      }
    });

    if(model.value.id){
        router.push({ name: "Dashboard" });
    }
  }
}
</script>

<style></style>
