<template>
  <ul class="nav nav-tabs">
    <li
      v-for="tab in items"
      :key="tab.title"
      class="nav-item"
    >
      <a
        class="nav-link"
        :class="{ active: tab.isActive }"
        href="javascript:void(0)"
        @click="$emit('selected', tab)"
      >
        {{ tab.title }}
      </a>
    </li>
    <li class="nav-item add-nav-item">
      <button
        type="button"
        class="btn btn-default btn-sm"
        @click="$emit('add')"
      >
        <i class="ni ni-fat-add"></i>
        New
      </button>
    </li>
  </ul>
</template>

<script setup lang="ts">
import { JsonViewerRecord } from '../JsonViewer.types';

type TabsListProps = {
  items: JsonViewerRecord[];
};

type TabsListEmits = {
  (e: 'add'): void;
  (e: 'selected', item: JsonViewerRecord): void;
};

defineProps<TabsListProps>();
defineEmits<TabsListEmits>();
</script>

<style scoped>
.add-nav-item {
  padding: 0.25rem 0.75rem;
}
</style>
