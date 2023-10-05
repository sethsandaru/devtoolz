<template>
  <ul class="nav nav-tabs">
    <li
      v-for="tab in items"
      :key="tab.title"
      class="nav-item"
    >
      <a
        v-if="!editingRecordId || editingRecordId !== tab.id"
        class="nav-link"
        :class="{ active: tab.isActive }"
        href="javascript:void(0)"
        title="Double click to rename"
      >
        <span
          class="mr-2"
          @click="$emit('selected', tab)"
          @dblclick="setEditMode(tab)"
        >
          {{ tab.title }}
        </span>
        <i
          class="ni ni-fat-remove text-lg text-red"
          @click="deleteRecord(tab, $event)"
        />
      </a>
      <a
        v-else
        class="nav-link d-flex editing-tab"
        :class="{ active: tab.isActive }"
        href="javascript:void(0)"
      >
        <input
          v-model="editingTitleValue"
          type="text"
          class="text-dark form-control-sm form-control"
          @keyup.enter="submitEdit"
        />
        <i
          class="ni text-lg ni-check-bold text-green pt-1"
          @click="submitEdit"
        />
        <i
          class="ni text-lg ni-fat-remove text-red pt-1"
          @click="setCancelEditMode"
        />
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
import { ref } from 'vue';

type TabsListProps = {
  items: JsonViewerRecord[];
};

type TabsListEmits = {
  (e: 'add'): void;
  (e: 'selected', item: JsonViewerRecord): void;
  (e: 'edited', id: string, title: string): void;
  (e: 'deleted', id: string): void;
};

defineProps<TabsListProps>();
const emits = defineEmits<TabsListEmits>();

const editingRecordId = ref<string>();
const editingTitleValue = ref<string>();

const setEditMode = (item: JsonViewerRecord) => {
  editingRecordId.value = item.id;
  editingTitleValue.value = item.title;
};

const setCancelEditMode = () => (editingRecordId.value = undefined);

const submitEdit = () => {
  if (!editingRecordId.value || !editingTitleValue.value) return;

  emits('edited', editingRecordId.value, editingTitleValue.value);
  setCancelEditMode();
};

const deleteRecord = (item: JsonViewerRecord, event: Event) => {
  event.preventDefault();

  if (
    !confirm(
      'Do you really want to delete this record? You will not be able to recover the data'
    )
  ) {
    return;
  }

  emits('deleted', item.id);
};
</script>

<style scoped>
.add-nav-item {
  padding: 0.25rem 0.75rem;
}

.editing-tab {
  gap: 0.3rem;
}
</style>
