<template>
  <div class="header-login-page grid grid-cols-3 gap-4">
    <div class="col-span-2 ...">
      <img src="/img/logo.svg" class="inline" />
    </div>
    <div class="... text-right">
      <button
        class="
          bg-blue-500
          relative
          hover:bg-blue-700
          px-5
          py-2
          text-sm
          leading-5
          rounded-md
          font-semibold
          text-white
        "
      >
        Regístrate gratis
        <span class="absolute right-0 inset-y-0 flex items-center pl-7">
          <ChevronRightIcon class="h-5 w-5 text-white" aria-hidden="true" />
        </span>
      </button>
    </div>
  </div>
  <div
    class="
      bg-login-page
      min-h-full
      flex
      items-center
      justify-center
      py-12
      px-4
      sm:px-6
      lg:px-8
    "
  >
    <div class="max-w-md w-full space-y-8">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import { LockClosedIcon } from "@heroicons/vue/solid";
import { ChevronRightIcon } from "@heroicons/vue/solid";
import TButtonLoading from "../components/core/TButtonLoading.vue";

export default {
  components: {
    LockClosedIcon,
  },
};
</script>
