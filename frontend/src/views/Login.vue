<template>
   <div class="panel-login">
      <div>
         <h2
            class="mt-3 text-center font-semibold uppercase text-lg text-gray-800"
            >
            Iniciar sesión
         </h2>
      </div>
      <div class="w-full text-center mt-4 mb-3">
         <img src="/img/google.svg" class="inline mr-2" />
         <img src="/img/linkedin.svg" class="inline" />
      </div>
      <div class="w-full text-center text-slate-400 text-sm">
         <p class="line">O inicia con</p>
      </div>
      <form class="mt-8 space-y-6" @submit="login">
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
         <input type="hidden" name="remember" value="true" />
         <div class="rounded-md shadow-sm">
            <div>
               <label class="font-sans text-slate-400 mb-3" for="email-address"
                  >Correo electrónico</label
                  >
               <input
                  id="email-address"
                  name="email"
                  type="email"
                  autocomplete="email"
                  required=""
                  v-model="user.email"
                  class="
                  appearance-none
                  mt-3
                  mb-3
                  rounded-md
                  text-slate-400
                  relative
                  block
                  w-full
                  px-3
                  py-2
                  border border-gray-300
                  placeholder-gray-500
                  text-gray-900
                  focus:outline-none
                  focus:ring-blue-500
                  focus:border-blue-500
                  focus:z-10
                  sm:text-sm
                  "
                  placeholder="Correo electrónico"
                  />
            </div>
            <div>
               <label class="font-sans text-slate-400" for="password"
                  >Contraseña</label
                  >
               <input
                  id="password"
                  name="password"
                  type="password"
                  autocomplete="current-password"
                  required=""
                  v-model="user.password"
                  class="
                  appearance-none
                  mt-3
                  text-slate-400
                  rounded-md
                  relative
                  block
                  w-full
                  px-3
                  py-2
                  border border-gray-300
                  placeholder-gray-500
                  text-gray-900
                  focus:outline-none
                  focus:ring-blue-500
                  focus:border-blue-500
                  focus:z-10
                  sm:text-sm
                  "
                  placeholder="Contraseña"
                  />
            </div>
         </div>
         <div class="w-full items-center">
            <TButtonLoading
               :loading="loading"
               class="m-auto relative justify-center"
               >
               Siguiente
               <span class="absolute right-0 inset-y-0 flex items-center pl-3">
                  <ChevronRightIcon
                     class="h-5 w-5 text-white"
                     aria-hidden="true"
                     />
               </span>
            </TButtonLoading>
         </div>
         <div class="text-center">
            <p class="font-sans text-sm text-slate-400 mb-3">
               No tienes cuenta? <span class="text-blue-600">Regístrate</span>
            </p>
         </div>
      </form>
   </div>
</template>

<script setup>
import { ChevronRightIcon } from "@heroicons/vue/solid";
import store from "../store";
import { useRouter } from "vue-router";
import { ref } from "vue";
import Alert from "../components/Alert.vue";
import TButtonLoading from "../components/core/TButtonLoading.vue";

const router = useRouter();

const user = {
  email: "",
  password: "",
};
let loading = ref(false);
let errorMsg = ref("");

function login(ev) {
  ev.preventDefault();

  loading.value = true;
  store
    .dispatch("login", user)
    .then(() => {
      loading.value = false;
      router.push({
        name: "Dashboard",
      });
    })
    .catch((err) => {
      loading.value = false;
      errorMsg.value = err.response.data.error;
    });
}
</script>
