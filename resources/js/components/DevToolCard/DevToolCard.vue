<script setup lang="ts">
type DevToolCardProps = {
  title?: string;
};

defineProps<DevToolCardProps>();
</script>

<template>
  <div class="card">
    <div class="card-body">
      <h3
        v-if="title"
        class="card-title mb-3"
        v-text="title"
      />
      <slot />
    </div>
  </div>
</template>

<style scoped></style>
