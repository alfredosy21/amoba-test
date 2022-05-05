
<template>
  <div class="bg-dashboard-page min-h-full">
    <div class="panel-transparent">
      <Disclosure as="nav">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
              <div class="flex-shrink-0"></div>
              <div class="hidden md:block"></div>
            </div>
            <div class="hidden md:block">
              <div class="ml-4 flex items-center md:ml-6">
                <!-- Profile dropdown -->
                <Menu as="div" class="ml-3 relative">
                  <div class="flex">
                    <MenuButton
                      class="
                        max-w-xs
                        flex
                        items-center
                        text-sm
                        focus:outline-none
                        focus:ring-2
                        focus:ring-offset-2
                        focus:ring-offset-gray-800
                        focus:ring-white
                      "
                    >
                      <div class="mx-3">
                        <div class="text-left">
                          <p
                            class="
                              text-base
                              inline
                              font-medium
                              leading-none
                              text-gray-800
                            "
                          >
                            {{ user.name }}
                          </p>
                          <CogIcon class="w-5 h-5 inline ml-2 text-gray-800" />
                        </div>
                      </div>
                      <img src="/img/profile.svg" class="inline w-10 h-10" />
                    </MenuButton>
                    <transition
                      enter-active-class="transition ease-out duration-100"
                      enter-from-class="transform opacity-0 scale-95"
                      enter-to-class="transform opacity-100 scale-100"
                      leave-active-class="transition ease-in duration-75"
                      leave-from-class="transform opacity-100 scale-100"
                      leave-to-class="transform opacity-0 scale-95"
                    >
                      <MenuItems
                        class="
                          origin-top-right
                          absolute
                          right-0
                          mt-2
                          w-48
                          rounded-md
                          shadow-lg
                          py-1
                          bg-white
                          ring-1 ring-black ring-opacity-5
                          focus:outline-none
                        "
                      >
                        <MenuItem v-slot="{}">
                          <a
                            @click="logout"
                            :class="[
                              'block px-4 py-2 text-sm text-gray-700 cursor-pointer',
                            ]"
                            >Cerrar sesión</a
                          >
                        </MenuItem>
                      </MenuItems>
                    </transition>
                  </div>
                </Menu>
              </div>
            </div>
          </div>
        </div>
      </Disclosure>
      <router-view :key="$route.path"></router-view>
    </div>
  </div>
</template>

<script>
import {
  Disclosure,
  DisclosureButton,
  DisclosurePanel,
  Menu,
  MenuButton,
  MenuItem,
  MenuItems,
} from "@headlessui/vue";
import { CogIcon } from "@heroicons/vue/outline";
import { useStore } from "vuex";
import { computed } from "vue";
import { useRouter } from "vue-router";

const navigation = [];

export default {
  components: {
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    CogIcon,
  },
  setup() {
    const store = useStore();
    const router = useRouter();
    function logout() {
      store.dispatch("logout").then(() => {
        router.push({
          name: "Login",
        });
      });
    }

    store.dispatch("getUser");

    return {
      user: computed(() => store.state.user.data),
      navigation,
      logout,
    };
  },
};
</script>