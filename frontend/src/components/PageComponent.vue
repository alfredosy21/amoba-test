<template>
  <div >
    <main>
      <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Replace with your content -->
        <div class="px-4 sm:px-0">
          <slot></slot>
        </div>
        <!-- /End replace -->
      </div>
    </main>
  </div>
</template>

<script setup>
const props = defineProps({
  title: String,
});
</script>
