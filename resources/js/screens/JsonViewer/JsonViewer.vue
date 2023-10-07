<template>
  <DevToolzPageLayout page-title="JSON Viewer">
    <DevToolCard>
      <TabsList
        :items="jsonRecords"
        @add="addNewRecord"
        @selected="selectedRecord"
        @edited="updateTitleRecord"
        @deleted="deleteRecord"
      />
      <JsonViewerEditor
        v-if="activeRecord"
        :key="activeRecord.title"
        :model-value="activeRecord.json"
        @update:model-value="updateJsonRecord"
      />
    </DevToolCard>
  </DevToolzPageLayout>
</template>

<script setup lang="ts">
import DevToolzPageLayout from '../../components/DevToolPage/DevToolzPageLayout.vue';
import DevToolCard from '../../components/DevToolCard/DevToolCard.vue';
import { defineAsyncComponent, onMounted, ref } from 'vue';
import { JsonViewerRecord } from './JsonViewer.types';
import * as JsonViewerMethods from './JsonViewer.methods';
import TabsList from './components/TabsList.vue';
import DevToolGlobalLoading from '../../components/DevToolGlobalLoading/DevToolGlobalLoading.vue';
import DevToolGlobalError from '../../components/DevToolGlobalError/DevToolGlobalError.vue';
import { ulid } from 'ulid';
import { storeAllToStorage } from './JsonViewer.methods';

const JsonViewerEditor = defineAsyncComponent({
  loader: () => import('./components/JsonViewerEditor.vue'),
  loadingComponent: DevToolGlobalLoading,
  errorComponent: DevToolGlobalError,
});

const jsonRecords = ref<JsonViewerRecord[]>([]);
const activeRecord = ref<JsonViewerRecord>();

const addNewRecord = () => {
  resetActive();
  const size = jsonRecords.value.length;

  jsonRecords.value.push({
    id: ulid(),
    title: `New Json Viewer ${size > 0 ? ` (${size})` : ''}`,
    json: '{}',
    isActive: true,
  });

  storeAllToStorage(jsonRecords.value);

  activeRecord.value = { ...jsonRecords.value[size] };
};

const resetActive = () => {
  jsonRecords.value.forEach((record) => (record.isActive = false));
  activeRecord.value = undefined;
};

const selectedRecord = (record: JsonViewerRecord) => {
  resetActive();
  record.isActive = true;
  activeRecord.value = { ...record };

  storeAllToStorage(jsonRecords.value);
};

const updateJsonRecord = (json: string) => {
  if (!activeRecord.value) return;

  activeRecord.value.json = json;

  const currentRecord = jsonRecords.value.find(
    (record) => record.id === activeRecord.value?.id
  );

  // to fulfill TS, we definitely have the record with the given ID
  if (!currentRecord) {
    return;
  }

  currentRecord.json = json;
  storeAllToStorage(jsonRecords.value);
};

const updateTitleRecord = (id: string, title: string) => {
  const currentRecord = jsonRecords.value.find((record) => record.id === id);

  // to fulfill TS, we definitely have the record with the given ID
  if (!currentRecord) {
    return;
  }

  currentRecord.title = title;
  storeAllToStorage(jsonRecords.value);
};

const deleteRecord = (id: string) => {
  const currentRecordIdx = jsonRecords.value.findIndex(
    (record) => record.id === id
  );
  if (currentRecordIdx < 0) {
    return;
  }

  const isCurrentRecord = id === activeRecord.value?.id;

  jsonRecords.value.splice(currentRecordIdx, 1);

  storeAllToStorage(jsonRecords.value);

  // if we deleted all records, create a brand new one
  // we always need to have a record
  if (jsonRecords.value.length === 0) {
    return addNewRecord();
  }

  // when we delete the current viewing record, set it back to 0
  if (isCurrentRecord) {
    selectedRecord(jsonRecords.value[0]);
  }
};

onMounted(() => {
  const historyRecords = JsonViewerMethods.getAllFromStorage();

  jsonRecords.value = [...historyRecords];

  // if we don't have any history record, create a blank one
  if (!historyRecords.length) {
    addNewRecord();
  } else {
    const defaultRecord = historyRecords.find((record) => !!record.isActive);
    selectedRecord(defaultRecord || historyRecords[0]);
  }
});
</script>
